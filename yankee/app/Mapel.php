<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mata_pelajaran';
	protected $primaryKey = 'id_mapel';
	protected $fillable = ['kode_mapel', 'nama_mapel'];
	public $timestamps = false;
}
