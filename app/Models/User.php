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
        'username', 'email', 'password', 'nama','slug', 'alamat', 'telp', 'role', 'pendidikan','token', 'status','str_slug'
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
        return $this->belongsToMany('App\Models\Scholarship','user_scholarship', 'user_id','scholarship_id');
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
