<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bahanajar extends Model
{
    protected $table = 'bahan_ajar';
	protected $primaryKey = 'id_bahan';
	protected $fillable = ['nama_bahan', 'nip', 'kode_kelas', 'kode_mapel', 'type', 'file'];
	public $timestamps = false;
	public function consoleguru(){
		return $this->belongsTo('App\Guru','nip','nip');
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
