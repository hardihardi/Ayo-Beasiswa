<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    protected $fillable = [
    'nama_beasiswa',
	'nama_instantsi',
	'quota',
	'konten',
	'alamat_gambar',
	'masa_berlaku',
	'user_id'];

	public function facilitator(){
		return $this->belongsTo('App\Models\Facilitator');
	}

	public function user(){
        return $this->belongsToMany('App\Models\User', 'user_scholarship', 'user_id','scholarship_id');
    }

    public function category(){
        return $this->belongsToMany('App\Models\Category', 'beasiswa_kategori', 'category_id','scholarship_id');
    }
}
