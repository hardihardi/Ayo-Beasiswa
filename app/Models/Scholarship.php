<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{

	// use Searchable;

	// public function searchableAs()
    // {
    //     return 'dev_beasiswa';
    // } 
    
    protected $fillable = [
    'nama_beasiswa',
	'nama_instantsi',
	'quota',
	'konten',
	'alamat_gambar',
	'masa_berlaku',
	'user_id',
	'status',
	'views',
	'berkas_diri',
	'ijazah',
	'organisasi',
	'sp_beasiswa',
	'berkas_keluarga',
	'quotas'
];

	public function facilitator(){
		return $this->belongsTo('App\Models\Facilitator');
	}

	public function user(){
        return $this->belongsToMany('App\Models\User', 'user_scholarship','scholarship_id', 'user_id')->withPivot('status');
    }

    public function categories(){
        return $this->belongsToMany('App\Models\Category', 'category_scholarships','scholarship_id' ,'category_id');
    }
}
