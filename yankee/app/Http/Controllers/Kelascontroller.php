<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Kelas;
use View;
use Input;
use DB;
use Redirect;

class Kelascontroller extends Controller
{
    public function index(){
		$kelas = Kelas::orderBy('id_kelas','DESC')->get();
		return view('kelas.viewkelas')->with('kelas', $kelas);	
	}
	public function Viewedit($id){
		$vkelas = Kelas::where('id_kelas', $id)->first();
		return view('kelas.editkelas')->with('kelas', $vkelas);	
	}
	protected function validatorData($data){
        return Validator::make($data, array(
            'kode_kelas' => 'required|max:255|unique:kelas',
			'nama_kelas' => 'required',
			'kapasitas' => 'required',
        ));
    }
	public function add(){
		$kelas = new Kelas();
		$kelas->kode_kelas = Input::get('kode_kelas');
		$kelas->nama_kelas = Input::get('nama_kelas');
		$kelas->kapasitas = Input::get('kapasitas');
		$data = array(
			'kode_kelas' => Input::get('kode_kelas'),
			'nama_kelas' => Input::get('nama_kelas'),
			'kapasitas' => Input::get('kapasitas'),
		);
		$vdata = $this->validatorData($data);
		if($vdata->passes()){
			$kelas->save();		
		}else{
			$mes = $mes.$vdata->messages();
			return redirect()->back()->with('error', $mes);	
		}
		return redirect()->to('/kelas/view')->with('message','Kelas Berhasil Ditambahkan');	
	}
	public function edit($id){
		$kelas = Kelas::where('id_kelas',$id)->first();
		$kelas->kode_kelas = Input::get('kode_kelas');
		$kelas->nama_kelas = Input::get('nama_kelas');
		$kelas->kapasitas = Input::get('kapasitas');
		$kelas->update();
		return redirect()->to('/kelas/view')->with('message','Kelas Berhasil Diubah');	
	}
	public function delete($id){
		$kelas = Kelas::where('id_kelas',$id)->first();
		$kelas->delete();
		return redirect()->to('/kelas/view')->with('message','Kelas Berhasil Dihapus');	
	}
}
