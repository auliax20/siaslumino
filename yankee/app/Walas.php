<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Walas extends Model
{
    protected $table = 'wali_kelas';
	protected $primaryKey = 'id_walas';
	protected $fillable = ['kode_walas', 'nip', 'tahun_ajaran'];
	public $timestamps = false;
	public function consoleguru(){
		return $this->belongsTo('App\Guru','nip','nip');
	}
	public function consolekelas(){
		return $this->belongsTo('App\Kelas','kode_kelas','kode_kelas');
	}
}
