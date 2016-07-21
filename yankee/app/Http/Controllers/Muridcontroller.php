<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Murid;
use View;
use Input;
use DB;
use Redirect;

class Muridcontroller extends Controller
{
	protected function validatorData(array $data)
    {
        return Validator::make($data, [
            'nis' => 'required|max:255|unique:murid',
			'nama_murid' => 'required',
			'alamat_murid' => 'required',
			'no_hp' => 'required',
			'username' => 'required|max:255|unique:murid',
        ]);
    }
	protected function validatorUser(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255|unique:user',
			'namalengkap' => 'required',
			'username' => 'required|max:255|unique:user',
            'password' => 'required|min:6|confirmed',
        ]);
    }
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
			'email' => Input::get('email'),
			'level' => 'murid'
		);
		$vdata = $this->validatorData($data);
		$vuser = $this->validatorUser($datauser);
		if($vdata->passes()){
			if($vuser->passes()){
				DB::table('user')->insert($datauser);	
				DB::table('murid')->insert($data);	
			}else{
				return redirect()->back()->with('error', $vuser->errors()->all());
			}
		}else{
			return redirect()->back()->with('error', $vdata->errors()->all());
		}
		return Redirect::to('/siswa/view')->with('message','Berhasil Disimpan');
	}
	public function Viewmurid(){
		$murid = DB::table('murid')->get();
		return View::make('murid.viewsiswa')->with('siswa', $murid);
	}
}
