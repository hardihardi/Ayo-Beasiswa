<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     public function scholarship(){
        return $this->belongsToMany('App\Models\Scholarship', 'beasiswa_category', 'category_id','scholarship_id');
    }
}
