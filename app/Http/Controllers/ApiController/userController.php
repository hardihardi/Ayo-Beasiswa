<?php

namespace App\Http\Controllers\ApiController;

use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;
use App\Models\User;
use JWTAuth;

use App\Http\Controllers\Controller;

use App\Models\Facilitator;

use Validator;
use Illuminate\Auth\Events\Registered;

use App\Mail\userRegistered;
use Illuminate\Support\Facades\Mail;


class userController extends Controller
{
    public function index(){
    	$show = User::all();
    	return $show;
    }

    public function update(Request $request){         
        $updated =$request->user();
        // kalo mkodel dan table user
        // $updated =JWTAuth::parseToken()->authenticate();
        //kalo bukan user nama table dan modelnya pake yang ini
        $updated->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'pendidikan' => $request->pendidikan, 
            'telp' => $request->telp, 
            'role' => $request->role
        ]);
        return $updated;
    }

    public function createFacilitator(Request $request){
       if($request->user()->role == 1){
         $facilitator = $request->user()->facilitator()->create([
            "nama_instansi" => $request->nama_instansi,
            "deskripsi_instansi"=> $request->deskripsi_instansi
        ]);
        
        return $facilitator;
    }
    return "Kamu tidak memiliki hak untuk ini";
       
    }

    public function signup(Request $request){
    	$this->validate($request, [
    		'username' => 'required|unique:users',
    		'email' => 'required|unique:users',
    		'password' => 'required',
    	]);

    	$create = User::create([
    		 'username' => $request->username,
    		 'email' => $request->email,
    		 'password' => bcrypt($request->password),
             'token'   => str_random(20)
    		]);

    	return $create;

    }

    public function signin(Request $request){
    	$this->validate($request, [
    		'username' => 'required',
    		'password' => 'required',
    	]);

    	// grab credentials from the request
        $credentials = $request->only('username', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'true',
                                        'error_log '=> 'Username dan Password tidak cocok bingits'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        $facilitator = $request->user()->facilitator;

        if($facilitator== null ){
            $facilitator = false;
        }else {
            $facilitator = true;
        }

        // dd($facilitator);
        // all good so return the token
        return response()->json([
            "error" => "false",
            "id"  =>  $request->user()->id,
            "username" => $request->user()->username,
            "email"    => $request->user()->email,
            "pendidikan"    => $request->user()->pendidikan,
            "alamat"    => $request->user()->alamat,
            "telp"    => $request->user()->telp,
            "token"    => $token,
            "alamat_gambar"    => $request->user()->img_url,
            "facilitator" => $facilitator
        ]);
    }


    public function aktivasi(Request $request){
         if ($request->user()->status == 0) {
                 if($request->user()->facilitator == null){
                 $request->user()->facilitator()->create([
                    'nama_instansi' => "",
                    'deskripsi_instansi' => "",
                    'token_facilitator'   => str_random(20)
                ]);
                               //mengirim email
                   $mail =  Mail::to($request->user()->email)->send(new mailRegister($request->user()));
                return response()->json(["Message" => "Please Check Your Email"]);
                 }
            }
        }

     public function logout(Request $request)
    {
       JWTAuth::invalidate($request->token);
       return response()->json(['message' => 'Successfully logged out']);
    }

    /**
    * Refresh a token.
    *
    * @return \Illuminate\Http\JsonResponse
    */
    public function refresh()
    {
      return $this->respondWithToken(auth()->refresh());
    }

    /**
    * Get the token array structure.
    *
    * @param  string $token
    *
    * @return \Illuminate\Http\JsonResponse
    */
    protected function respondWithToken($token)
    {
      return response()->json([
          'access_token' => $token,
          'token_type' => 'bearer',
          'expires_in' => auth()->factory()->getTTL() * 60
      ]);
    }

}
