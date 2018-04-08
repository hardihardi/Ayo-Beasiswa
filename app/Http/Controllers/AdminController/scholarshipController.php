<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;


class scholarshipController extends Controller
{
    public function index(){
    	return view('admin.list');
    }
    public function create(){
    	return view('admin.createScholarship');
    }

    public function show($id){
    	return view('admin.singleScholarship');
    }
}
