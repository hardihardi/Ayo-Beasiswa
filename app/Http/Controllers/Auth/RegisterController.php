<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Facilitator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

use Validator;
use App\Http\Helper\Upload;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use App\Mail\mailRegis;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator =  Validator::make($data, [
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        
   }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    public function register(Request $request)
    {
        $this->validator($request->all());
        event(new Registered($user = $this->create($request->all())));
        return redirect('/login')->with('warning', 'Please Check Your Email Address');
    }


    protected function create(array $data)
    {
        $user =  User::create([
            'username' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'token'   => str_random(20),
            'str_slug' =>  str_slug($data['name'], '-')
        ]);
         //mengirim email
        Mail::to($user->email)->send(new mailRegis($user));
    }

       public function verify_register($token, $id)
        {
        $user = User::find($id);

        if (!$user) {
            return redirect('login')->with('warning', 'user not found');
        }

        if ($user->token != $token) {
            return redirect('login')->with('warning', 'token not match');
        }

        $user->status = 1;
        $user->save();
        Upload::create_dir('public/users/'.$user->token);
        $this->guard()->login($user);
        return redirect('user/'. $user->username);
         }

}
