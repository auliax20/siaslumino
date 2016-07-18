<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Redirect;

class Muridcontroller extends Controller
{
	
    public function Tambahdata(){
		$data = array(
			'nis' => Input::get('nis'),
			'nama_murid' => Input::get('nama_murid'),
			'nis' => Input::get('nis'),
			'alamat_murid' => Input::get('alamat_murid'),
			'no_hp' => Input::get('no_hp'),
			'username' => Input::get('username'),
		);
		$datauser = array(
			'namalengkap' => Input::get('nama_murid'),
			'username' => Input::get('username'),
			'password' => Input::get('password'),
		);
		DB::table('murid')->insert($data);
		return Redirect::to('/viewuser')->with('message','Berhasil Disimpan');
	}
}
