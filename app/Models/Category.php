<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     public function scholarships(){
        return $this->belongsToMany('App\Models\Scholarship', 'beasiswa_kategori', 'scholarship_id','category_id');
    }
}
