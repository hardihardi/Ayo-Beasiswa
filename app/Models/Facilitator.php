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
    	return $this->belongsTo('App\Models\User');
    }
    public function Scholarship(){
        return $this->hasMany('App\Models\Scholarship');
    }
}
