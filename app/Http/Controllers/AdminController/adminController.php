<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

class adminController extends Controller
{
     public function index()
    {
        return view('admin.home');
    }
}
