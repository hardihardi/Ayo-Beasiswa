<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholarship;

class historyController extends Controller
{
    public function index(Request $request){
    	return $request->user();
    }


}
