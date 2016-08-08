<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
	protected $primaryKey = 'id_nilai';
	protected $fillable = ['nis', 'kode_mapel', 'jenis_nilai', 'nilai', 'nip', 'tahun_ajaran', 'kode_kelas'];
	public $timestamps = false;
	public function consolemurid(){
		return $this->belongsTo('App\Murid','nis','nis');
	}
	public function consoleguru(){
		return $this->belongsTo('App\Guru','nip','nip');
	}
	public function consolekelas(){
		return $this->belongsTo('App\Kelas','kode_kelas','kode_kelas');
	}
	public function consolemapel(){
		return $this->belongsTo('App\Mapel','kode_mapel','kode_mapel');
	}
}
