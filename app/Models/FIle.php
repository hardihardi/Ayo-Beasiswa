<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'user_id', 'berkas_1','berkas_2','berkas_3','berkas_4','berkas_5','berkas_6'
    ];

    public function user(){
        $this->belongsTo("App\Models\User", "user_id", "id");
    }

}
