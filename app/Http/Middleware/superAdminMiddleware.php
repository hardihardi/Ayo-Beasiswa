<?php

namespace App\Http\Middleware;

use Closure;

class superAdminMiddleware
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

        $user = $request->user();

        if($user){
            if($user->isSuperAdmin()){
                return $next($request);
            }
        }

       return redirect()
                    ->back()
                    ->withErrors(sprintf("Anda Tidak Memiliki Akses"));
    }
}
