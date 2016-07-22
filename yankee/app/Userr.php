<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userr extends Model
{
    protected $table = 'user';
	protected $primaryKey = 'id_user';
	protected $fillable = ['password', 'username'];
	public $timestamps = false;
	
}
