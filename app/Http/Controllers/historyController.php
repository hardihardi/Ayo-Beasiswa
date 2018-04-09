<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class historyController extends Controller
{
    public function index($id){

    	$user = User::with(['scholarship', 'scholarship.categories', 'scholarship.user', 'scholarship.facilitator'])->where('id', $id)->first();
    	return response()->json($user->scholarship);
    	
    }


}
