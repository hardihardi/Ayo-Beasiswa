<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facilitator extends Model
{
    protected $fillable = [
    	"nama_instansi",
        "deskripsi_instansi",
        "user_id",
        "token_facilitator",
        "img_url",
        "str_slug",
        "berkas_pendukung",
        "kategori",
        "alamat",
        "no_tempat",
        "nama_jalan",
        "kecamatan",
        "kelurahan",
        "kota",
        "provinsi",
        "kode_pos",
        "lat",
        "lng"
    ];


    public function User(){
    	return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function Scholarships(){
        return $this->hasMany('App\Models\Scholarship');
    }

    public function Emails(){
        return $this->hasMany('App\Models\Email');
    }

    public function statusF(){
        if($this->status) return true;
        return false;
    }
}
