<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
	protected $primaryKey = 'id_guru';
	protected $fillable = ['nip', 'nama_guru', 'tanggal_lahir', 'jabatan', 'username'];
	public $timestamps = false;
}
