<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ortu extends Model
{
    protected $table = 'ortu';
	protected $primaryKey = 'id_ortu';
	protected $fillable = ['nama_ortu', 'nis', 'alamat_ortu', 'telp_ortu', 'hp_ortu', 'username'];
	public $timestamps = false;
	public function console(){
		return $this->belongsTo('App\Murid','nis','nis');
	}
}
