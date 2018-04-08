<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;


class profileController extends Controller
{
    public function index(){
    	return view('admin.profile');
    }
    public function organizer(){
    	return view('admin.organizer');
    }
}
