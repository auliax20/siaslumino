<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
	protected $primaryKey = 'id_buku';
	protected $fillable = ['kode_buku', 'nama_buku', 'jumlah'];
	public $timestamps = false;
}
