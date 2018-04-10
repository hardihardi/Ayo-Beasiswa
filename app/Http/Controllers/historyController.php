<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class historyController extends Controller
{
    public function index($id){

    	$user = User::with(['facilitator', 'scholarship','scholarship.categories','scholarship.facilitator'])->where('id', $id)->get();
    	// dd($user);
    	return response()->json($user);
    	
    }


}
