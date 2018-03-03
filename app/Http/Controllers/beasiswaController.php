<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;


class beasiswaController extends Controller
{
    public function show(){
    	return Scholarship::all();
    }

    public function single($id){
    	$single = Scholarship::with(['user', 'facilitator', 'category'])->where('id', $id)->first();
    	return $single;
    }
}
