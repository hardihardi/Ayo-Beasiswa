<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facilitator extends Model
{
    protected $fillable = [
    	"nama_instansi",
    	"deskripsi_instansi",
    ];


    public function User(){
    	return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function Scholarships(){
        return $this->hasMany('App\Models\Scholarship');
    }
}