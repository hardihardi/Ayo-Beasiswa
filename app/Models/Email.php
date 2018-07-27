<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
      protected $fillable = [
    	"facilitator_id",
    	"subject",
    	"email",
    	"konten", 
    	"status"
    ];

    public function facilitator(){
		return $this->belongsTo('App\Models\Facilitator');
	}
}
