<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'nama','slug', 'alamat', 'telp', 'role', 'pendidikan','token', 'status','str_slug','nama_depan','nama_belakang','nama_panggilan','telp_hp','telp','alamat_1','alamat_2','provinsi','kota','kode_pos', 'jenis_kelamin', 'aktifitas_terakhir', 'berkas_diri', 'ijazah', 'organisasi', 'sp_beasiswa', 'berkas_keluarga', 'berkas_pendukung'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function facilitator(){
        return $this->hasOne('App\Models\Facilitator','user_id', 'id');
    }

    public function scholarship(){
        return $this->belongsToMany('App\Models\Scholarship','user_scholarship', 'user_id','scholarship_id')->withPivot('berkas_diri', 'ijazah','organisasi','sp_beasiswa','berkas_keluarga','berkas_lain','status','berkas_pendukung');
    }

     public function isAdmin(){
        if($this->role == 2) return true;

        return false;
    }

    public function file(){
        return $this->hasOne('App\Models\File', 'user_id', 'id');
    }

    public function isUser(){
        if($this->role == 1 || $this->role == 2) return true;

        return false;
    }

   
}
