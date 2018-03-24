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
    	if($id == "order"){
    		return Scholarship::with(['user', 'facilitator', 'categories'])->orderby('created_at', 'asc')->take(3)->get(); 
    	}
    	$single = Scholarship::with(['user', 'facilitator', 'categories'])->where('id', $id)->first();
    	return $single;
    }

    public function priority(){
    	return Scholarship::with(['facilitator', 'categories'])->where('prioritas', 1)->get();
    }

}
