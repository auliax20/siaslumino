<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Trxpustaka extends Model
{
    protected $table = 'trx_pustaka';
	protected $primaryKey = 'id_kembali';
	protected $fillable = ['kode_buku', 'nis', 'tanggal_batas', 'tanggal_kembali', 'total_denda'];
	public $timestamps = false;
	public function consolemurid(){
		return $this->belongsTo('App\Murid','nis','nis');
	}
	public function consolebuku(){
		return $this->belongsTo('App\Buku','kode_buku','kode_buku');
	}
}
