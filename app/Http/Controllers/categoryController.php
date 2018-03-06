<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class categoryController extends Controller
{
        public function single($single){
    	$kategori = Category::with(['scholarships'])->where('judul', $single)->get();
    	return $kategori;
    }
}
