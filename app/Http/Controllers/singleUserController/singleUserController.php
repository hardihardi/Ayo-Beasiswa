<?php
namespace App\Http\Controllers\singleUserController;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class singleUserController extends Controller
{
    
    public function index($user){
        $allows = User::where('str_slug', $user)->first();
        if($allows == Auth::user()){
            return view('userSetting', ["user" => Auth::user()]);
        }
        return view('user', ["user" => $allows]);
    }
}
