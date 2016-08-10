<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Absensi;
use App\Option;
use View;
use Input;
use DB;
use Redirect;

class Absensicontroller extends Controller
{
	protected function validatorData($data){
        return Validator::make($data, array(
            'nis' => 'required',
			'nip' => 'required',
			'kode_kelas' => 'required',
			'jam_pelajaran' => 'required',
			'kode_mapel' => 'required',
			'status' => 'required',
			'tanggal_absen' => 'required',
        ));
    }
    public function add(){
		$absen = new Absensi();
		$anis = explode(" ",Input::get('nis'));
		$anip = explode(" ",Input::get('nip'));
		$akodek = explode(" ",Input::get('kode_kelas'));
		$amapel = explode(" ",Input::get('kode_mapel'));
		$knis =$anis[0];
		$knip =$anip[0];
		$kkodek =$akodek[0];
		$kmapel =$amapel[0];
		$absen->nis = $knis;
		$absen->nip = $knip;
		$absen->kode_kelas = $kkodek;
		$absen->jam_pelajaran = Input::get('jam_pelajaran');
		$absen->kode_mapel = $kmapel;
		$absen->status = Input::get('status');
		$absen->tanggal_absen = Input::get('tanggal_absen');
		$data = array(
			'nis' => $knis,
			'nip' => $knip,
			'kode_kelas' => $kkodek,
			'jam_pelajaran' => Input::get('jam_pelajaran'),
			'kode_mapel' => $kmapel,
			'status' => Input::get('status'),
			'tanggal_absen' => Input::get('tanggal_absen'),
		);
		$vdata = $this->validatorData($data);
		if($vdata->passes()){
			$absen->save();
			return redirect()->back()->with('message', 'Absen Berhasil Disimpan');
		}else{
			$mes = $vdata->messages();
			return redirect()->back()->with('error', $mes);	
		}			
	}
	public function filterByKelas(){
		$ta = Option::orderBy('tahun_ajaran','DESC')->first();
		$absensi = Absensi::where('kode_kelas',Input::get('kelas'))
					->andwhere('tahun_ajaran', $ta->tahun-ajaran)->get();
		return view('absensi.viewabsensi')->with('absensi',$absensi);
	}
	public function filterByNis(){
		$ta = Option::orderBy('tahun_ajaran','DESC')->first();
		$absensi = Absensi::where('nis',Input::get('nis'))
					->andwhere('tahun_ajaran', $ta->tahun-ajaran)->get();
		return view('absensi.viewabsensi')->with('absensi',$absensi);
	}
	public function filterByStatus(){
		$ta = Option::orderBy('tahun_ajaran','DESC')->first();
		$absensi = Absensi::where('status',Input::get('status'))
					->andwhere('tahun_ajaran', $ta->tahun-ajaran)->get();
		return view('absensi.viewabsensi')->with('absensi',$absensi);
	}
	public function filterByTanggal(){
		$ta = Option::orderBy('tahun_ajaran','DESC')->first();
		$absensi = Absensi::where('tanggal_absen',Input::get('tanggal_absen'))
					->andwhere('tahun_ajaran', $ta->tahun-ajaran)->get();
		return view('absensi.viewabsensi')->with('absensi',$absensi);
	}
	public function filterByKelasTanggal(){
		$ta = Option::orderBy('tahun_ajaran','DESC')->first();
		$absensi = Absensi::where('kode_kelas', Input::get('kelas'))
					->andwhere('tanggal_absen', Input::get('tanggal_absen'))
					->andwhere('tahun_ajaran', $ta->tahun-ajaran)->get();
		return view('absensi.viewabsensi')->with('absensi',$absensi);
	}
	public function filterBySiswaTanggal(){
		$ta = Option::orderBy('tahun_ajaran','DESC')->first();
		$absensi = Absensi::where('nis', Input::get('nis'))
					->andwhere('tanggal_absen', Input::get('tanggal_absen'))
					->andwhere('tahun_ajaran', $ta->tahun-ajaran)->get();
		return view('absensi.viewabsensi')->with('absensi',$absensi);
	}
}
