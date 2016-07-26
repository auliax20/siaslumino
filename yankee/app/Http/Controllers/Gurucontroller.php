<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Guru;
use App\Userr;
use View;
use Input;
use DB;
use Redirect;

class Gurucontroller extends Controller
{
	public function index(){
    	$data = Guru::orderBy('id_guru','DESC')->paginate(50);
		return view('guru.viewguru')->with('guru', $data);
	}
	protected function validatorData($data)
    {
        return Validator::make($data, array(
            'nip' => 'required|max:255|unique:guru',
			'nama_guru' => 'required',
			'tanggal_lahir' => 'required',
			'jabatan' => 'required',
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
	public function add(Request $request){
		$data = array(
			'nip' => Input::get('nip'),
			'nama_guru' => Input::get('nama_guru'),
			'tanggal_lahir' => Input::get('tanggal_lahir'),
			'jabatan' => Input::get('jabatan'),
			'username' => Input::get('username')
		);
		$vdatauser = array(
			'namalengkap' => Input::get('nama_guru'),
			'username' => Input::get('username'),
			'password' => Input::get('password'),
			'password_confirmation' => Input::get('password_confirmation'),
			'email' => Input::get('email')
		);
    	$tambah = new Guru();
		$tambah->nip = $request['nip'];
		$tambah->nama_guru = $request['nama_guru'];
		$tambah->tanggal_lahir = $request['tanggal_lahir'];
		$tambah->jabatan = $request['jabatan'];
		$tambah->username = $request['username'];
		$tambahguru = new Userr();
		$tambahguru->username = $request['username'];
		$tambahguru->namalengkap = $request['nama_guru'];
		$tambahguru->password = $request['password'];
		$tambahguru->email = $request['email'];
		$vguru = $this->validatorData($data);
		$vuguru = $this->validatorUser($vdatauser);
		if($vguru->passes() && $vuguru->passes()){
			$tambah->save();
			$tambahguru->save();
			return redirect()->to('guru/view')->with('message','Data Berhasil Disimpan');
		}else{
			$mes = $vguru->messages();
			$mes = $mes.$vuguru->messages();
			return redirect()->back()->with('error', $mes);	
		}
	}
	public function viewedit($id){
		$viewguru = Guru::where('username',$id)->first();
		return view('guru.editguru')->with('guru',$viewguru);
			
	}
	public function update($id){
		$update = Guru::where('username',$id);
		$update->nip = Input::get('nip');
		$update->nama_guru = Input::get('nama_guru');
		$update->tanggal_lahir = Input::get('tanggal_lahir');
		$update->jabatan = Input::get('jabatan');
		$update->update();
		return redirect()->to('/guru/view');			
	}
	public function delete($id){
		$delete = Guru::where('username',$id);
		$delete->delete();
		return redirect()->to('/guru/view/');	
	}
}
