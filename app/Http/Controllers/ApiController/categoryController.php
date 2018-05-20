<?php

namespace App\Http\Controllers\ApiController;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Facilitator;

class categoryController extends Controller
{
        public function single($single){
    	$kategori = Category::with(['scholarships'])->where('judul', $single)->get();
    	return $kategori;
    }


}
 