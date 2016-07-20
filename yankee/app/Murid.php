<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $table = 'murid';
	protected $primaryKey = 'id_murid';
	protected $fillable = ['nis', 'nama_murid', 'alamat_murid', 'no_hp', 'username'];
	public $timestamps = false;
	
}
