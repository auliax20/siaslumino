<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	//protected $primaryKey = 'id_user';
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'username', 'password',
    ];
    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'token',
    ];
}
