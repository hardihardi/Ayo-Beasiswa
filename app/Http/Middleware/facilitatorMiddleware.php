<?php

namespace App\Http\Middleware;

use Closure;

class facilitatorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // dd($facilitator = $request->user()->facilitator);
        $facilitator = $request->user()->facilitator;

        if($facilitator){
            if($facilitator->statusF()){
                return $next($request);
            }
        }

        return redirect('setting/dashboard')
        ->with('status', 'Terima kasih telah menjadi facilitator, demi keamanan dan kenyamanan user dan facilitator lainnya kami sedang melakukan validaasi data anda,mohon tunggu 2 x 24 jam. untuk mempercepat validasi mohon lengkapi data diri anda/perusahaan anda !');
    }
}
