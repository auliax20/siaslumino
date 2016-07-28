<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ortu;
use App\Murid;
use App\Userr;
use View;
use Input;
use DB;
use Redirect;

class Ortucontroller extends Controller
{
    public function index(){
		$ortu = Ortu::with('console')->get();	
		return view('ortu.viewortu')->with('ortu',$ortu);
	}
	public function formadd(){
		$siswa = Murid::orderBy('nama_murid', 'ASC')->get();	
		return view('ortu.inputortu')->with('siswa',$siswa);
	}
	protected function validatorData($data)
    {
        return Validator::make($data, array(
			'nama_ortu' => 'required',
			'nis' => 'required',
			'alamat_ortu' => 'required',
			'telp_ortu' => 'required',
			'hp_ortu' => 'required',
			'username' => 'required|max:255|unique:guru',
        ));
    }
	protected function validatorUser($datau)
    {
        return Validator::make($datau, array(
            'email' => 'required|email|max:255|unique:user',
			'namalengkap' => 'required',
			'username' => 'required|max:255|unique:user',
            'password' => 'required|min:6|confirmed',
        ));
    }
	public function add(){
		$ortu = new Ortu();
		$ortu->nama_ortu = Input::get('nama_ortu');
		$ortu->nis = Input::get('nis');
		$ortu->alamat_ortu = Input::get('alamat_ortu');
		$ortu->telp_ortu = Input::get('telp_ortu');
		$ortu->hp_ortu = Input::get('hp_ortu');
		$ortu->username = Input::get('username');
		$user = new Userr();
		$user->namalengkap = Input::get('nama_ortu');
		$user->username = Input::get('username');
		$user->password = bcrypt(Input::get('password'));
		$user->email = Input::get('email');
		$user->level = 'orangtua';
		$data = array(
			'nama_ortu' => Input::get('nama_ortu'),
			'nis' => Input::get('nis'),
			'alamat_ortu' => Input::get('alamat_ortu'),
			'telp_ortu' => Input::get('telp_ortu'),
			'hp_ortu' => Input::get('hp_ortu'),
			'username' => Input::get('username')
		);
		$datau = array(
			'namalengkap' => Input::get('nama_ortu'),
			'username' => Input::get('nis'),
			'password' => Input::get('password'),
			'password_confirmation' => Input::get('password_confirmation'),
			'email' => Input::get('email')
		);
		$vdata = $this->validatorData($data);
		$vdatau = $this->validatorUser($datau);
		if($vdata->passes() && $vdatau->passes()){
			$ortu->save();
			$user->save();
			return redirect()->to('/ortu/view')->with('message','Data Orangtua Berhasil Disimpan');	
		}else{
			$mes = $vdata->messages().$vdatau->messages();	
			return redirect()->back()->with('error', $mes);
		}
	}
	public function viewedit($edit){
		$ortu = Ortu::where('id_ortu',$edit)->first();
		$siswa = Murid::orderBy('nama_murid','ASC')->get();
		return view('ortu.editortu')->with('ortu',$ortu)->with('siswa',$siswa);
	}
	public function edit($id){
		$ortu = Ortu::where('id_ortu',$id)->first();
		$ortu->nama_ortu = Input::get('nama_ortu');
		$ortu->nis = Input::get('nis');
		$ortu->alamat_ortu = Input::get('alamat_ortu');
		$ortu->telp_ortu = Input::get('telp_ortu');
		$ortu->hp_ortu = Input::get('hp_ortu');
		$ortu->update();
		return redirect()->to('/ortu/view')->with('message', 'Data Orang Tua Berhasil Dirubah');
	}
	public function delete($id){
		$ortu = Ortu::where('id_ortu',$id)->first();
		$ortu->delete();
		return redirect()->to('/ortu/view')->with('message', 'Data Orang Tua Berhasil Dihapus');	
	}
}
