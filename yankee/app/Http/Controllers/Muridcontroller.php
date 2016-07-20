<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Murid;
use Input;
use DB;
use Redirect;

class Muridcontroller extends Controller
{
	
    public function Tambahdata(){
		$data = array(
			'nis' => Input::get('nis'),
			'nama_murid' => Input::get('nama_murid'),
			'alamat_murid' => Input::get('alamat_murid'),
			'no_hp' => Input::get('no_hp'),
			'username' => Input::get('username')
		);
		$datauser = array(
			'namalengkap' => Input::get('nama_murid'),
			'username' => Input::get('username'),
			'password' => bcrypt(Input::get('password')),
			'email' => Input::get('email')
		);
		DB::table('murid')->insert($data);
		DB::table('user')->insert($datauser);
		return Redirect::to('/viewuser')->with('message','Berhasil Disimpan');
	}
	public function index(){
		$datamurid = Murid::orderBy('nis','DESC')->paginate(100);
		return view('viewsiswa')->with('datamurid',$datamurid);
	}
}
