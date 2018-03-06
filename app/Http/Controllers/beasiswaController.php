<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;


class beasiswaController extends Controller
{
    public function show(){
    	return Scholarship::with(['user', 'facilitator', 'categories'])->get();
    }

    public function single($id){
    	$single = Scholarship::with(['user', 'facilitator', 'categories'])->where('id', $id)->first();
    	return $single;
    }
}
