<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;
use App\Models\User;
use JWTAuth;



class userController extends Controller
{
    public function index(){
    	$show = User::where('id',1)->first();
    	dd($show->facilitator($show->role)->first()->deskripsi_instansi);
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
    		 'password' => bcrypt($request->password)
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
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }
}
