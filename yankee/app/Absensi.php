<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'pustaka';
	protected $primaryKey = 'id_pinjam';
	protected $fillable = ['nis', 'kode_buku', 'tanggal_pinjam', 'tanggal_batas', 'tanggal_kembali'];
	public $timestamps = false;
	public function consolemurid(){
		return $this->belongsTo('App\Murid','nis','nis');
	}
	public function consolebuku(){
		return $this->belongsTo('App\Buku','kode_buku','kode_buku');
	}
}
