<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests;


class profileController extends Controller
{
    public function organizer(){
    	return view('admin.organizer');
    }

   	public function index(Request $request){
    	$user = $request->user();   	
    	return view('admin.profile', ["user" => $user]);
    	// return view('admin.profile');
         // return view('admin.listScholarship', ["beasiswas" => $beasiswa]);
    }

      public function update(request $request){
      $user = $request->user();  
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->nama = $request->nama;
        $user->alamat = $request->alamat;
        $user->pendidikan = $request->pendidikan;
        $user->telp = $request->telp;
         if($request->file('logo')){
            
            $file = $request->file('logo');   
            $destinationPath = 'img/profile';
            $name = $request->username.".". $file->getClientOriginalExtension();
            $file->move($destinationPath,$name);
            $user->img_url = "/img/profile/". $name;
        }
       $user->save();
       return view('admin.profile', ["user" => $user]);   
    }
}
