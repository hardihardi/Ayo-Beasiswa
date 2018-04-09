<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Scholarship;
use App\Http\Requests;


class scholarshipController extends Controller
{
    public function index(){
    	$beasiswa = Scholarship::with(['user', 'facilitator', 'categories'])->get();
    	// dd($beasiswa[0]->categories);
    	return view('admin.list',["beasiswas" => $beasiswa]);
    }
    public function create(){
    	return view('admin.createScholarship');
    }

    public function show($id){
    	$beasiswa = Scholarship::with(['user', 'facilitator', 'categories'])->where('id', $id)->first();
    	dd($beasiswa);
    	
    	return view('admin.singleScholarship', ["beasiswas" => $beasiswa]);
    }
}
