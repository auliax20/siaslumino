<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Walas;
use App\Guru;
use App\Kelas;
use View;
use Input;
use DB;
use Redirect;

class Walascontroller extends Controller
{
	public function index(){
		$walas = Walas::with('consoleguru','consolekelas')->get();
		return view('walas.viewwalas')->with('walas', $walas);
	}
	public function formadd(){
		$kelas = Kelas::orderBy('nama_kelas', 'DESC')->get();	
		$guru = Guru::orderBy('nama_guru', 'DESC')->get();
		return view('walas.inputwalas')->with('kelas', $kelas)->with('guru',$guru);
	}
	protected function validatorData($data)
    {
        return Validator::make($data, array(
			'nip' => 'required',
			'kode_kelas' => 'required',
        ));
    }
	public function add(){
		$walas = new Walas();
		$walas->nip = Input::get('nip');
		$walas->kode_kelas = Input::get('kode_kelas');
		$data = array(
			"nip" => Input::get('nip'),
			"kode_kelas" => Input::get('kode_kelas')
		);
		$vdata = $this->validatorData($data);
		if($vdata->passes()){
			$walas->save();	
			return redirect()->to('/walas/view')->with('message', 'Data Wali Kelas Berhasil Ditambah');
		}else{
			$mes = $vdata->message();
			return redirect()->back()->with('error', $mes);
		}
	}
	public function viewedit($id){
		$walas = Walas::where('id_walas', $id)->first();
		$guru = Guru::orderBy('nama_guru', 'DESC')->get();
		$kelas = Kelas::orderBy('nama_kelas', 'DESC')->get();
		return view('walas.editwalas')->with('walas',$walas)->with('guru', $guru)->with('kelas', $kelas);
	}
	public function edit($id){
		$walas = Walas::where('id_walas', $id)->first();	
		$walas->nip = Input::get('nip');
		$walas->kode_kelas = Input::get('kode_kelas');
		$walas->update();
		return redirect()->to('/walas/view')->with('message', 'Data Wali Kelas Berhasil Dirubah');
	}
	public function delete($id){
		$walas = Walas::where('id_walas', $id)->first();
		$walas->delete();
		return redirect()->to('/walas/view')->with('message', 'Data Wali Kelas Berhasil Dihapus');
	}
}
