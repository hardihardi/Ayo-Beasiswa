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
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function facilitator($role){
        if($role === 1)
            return $this->hasOne('App\Models\Facilitator');
        else 
            return 0;
    }

    public function scholarship(){
        return $this->belongsToMany('App\Models\Scholarship');
    }
}
