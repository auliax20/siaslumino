<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokal extends Model
{
    protected $table = 'lokal';
	protected $primaryKey = 'id_lokal';
	protected $fillable = ['nis', 'kode_kelas', 'tahun_ajaran'];
	public $timestamps = false;
	public function consolemurid(){
		return $this->belongsTo('App\Murid','nis','nis');
	}
	public function consolekelas(){
		return $this->belongsTo('App\Kelas','kode_kelas','kode_kelas');
	}
}
