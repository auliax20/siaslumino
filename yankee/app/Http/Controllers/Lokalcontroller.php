<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Lokal;
use App\Option;
use View;
use Input;
use DB;
use Redirect;

class Lokalcontroller extends Controller
{
    protected function validatorData($data){
        return Validator::make($data, array(
            'nis' => 'required',
			'kode_kelas' => 'required',
        ));
    }
	public function add(){
		$anis = explode(" ", Input::get('nis'));
		$nis = $anis[0];
		$akode = explode(" ", Input::get('kode_kelas'));
		$kodekelas = $akode[0];
		$opt = Option::orderBy('tahun_ajaran','DESC')->first();
		$ta = $opt->tahun_ajaran;
		$data = array(
			'nis' => $nis,
			'kode_kelas' => $kodekelas,
		);
		$vdata = $this->validatorData($data);
		if($vdata->passes()){
			$lokal = new Lokal();
			$lokal->nis = $nis;	
			$lokal->kode_kelas = $kodekelas;
			$lokal->tahun_ajaran = $ta;
			$lokal->save();
			return redirect()->back()->with('message', 'Data Berhasil Disimpan');
		}else{
			$mes = $vdata->messages();
			return redirect()->back()->with('error', $mes);	
		}
	}
	public function edit($id){
		$anis = explode(" ", Input::get('nis'));
		$nis = $anis[0];
		$akode = explode(" ", Input::get('kode_kelas'));
		$kodekelas = $akode[0];
		$lokal = Lokal::where('id_lokal',$id)->first();	
		$lokal->nis = $nis;
		$lokal->kode_kelas = $kodekelas;
		$lokal->update();
		return redirect()->to('/lokal/view')->with('message', 'Data Berhasil Diubah');
	}
	public function viewedit($id){
		$lokal = Lokal::where('id_lokal',$id)->first();
		return view('lokal.editlokal')->with('siswa', $lokal);
	}
	public function index(){
		$lokal = Lokal::orderBy('nis','ASC')->get();
		return view('lokal.viewlokal')->with('siswa', $lokal);
	}
	public function delete($id){
		$lokal = Lokal::where('id_lokal',$id)->first();	
		return redirect()->to('/lokal/view')->with('message', 'Data Berhasil Dihapus');
	}
	public function byKelas(){
		$akode = explode(" ", Input::get('kode_kelas'));
		$kodekelas = $akode[0];
		$lokal = Lokal::where('kode_kelas',$kodekelas)->orderBy('tahun_ajaran','DESC')->get();	
		return view('lokal.viewlokal')->with('siswa', $lokal);
	}
	public function byNis(){
		$anis = explode(" ", Input::get('nis'));
		$nis = $anis[0];
		$lokal = Lokal::where('nis', $nis)->orderBy('tahun_ajaran','DESC')->get();
		return view('lokal.viewlokal')->with('siswa', $lokal);
	}
}
