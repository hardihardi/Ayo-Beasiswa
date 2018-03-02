<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    public function index(){
    	$show = User::find(1)->first();
    	dd($show->facilitator($show->role)->first()->deskripsi_instansi);
    }
}
