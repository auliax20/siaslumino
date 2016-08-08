<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';
	protected $primaryKey = 'id_absensi';
	protected $fillable = ['nis', 'nip', 'kode_kelas', 'jam-pelajaran', 'kode_mapel', 'status', 'tanggal_absen'];
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
