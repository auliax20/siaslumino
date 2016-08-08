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
		$absen->nis = Input::get('nis');
		$absen->nip = Input::get('nip');
		$absen->kode_kelas = Input::get('kode_kelas');
		$absen->jam_pelajaran = Input::get('jam_pelajaran');
		$absen->kode_mapel = Input::get('kode_mapel');
		$absen->status = Input::get('status');
		$absen->tanggal_absen = Input::get('tanggal_absen');
		$data = array(
			'nis' => Input::get('nis'),
			'nip' => Input::get('nip'),
			'kode_kelas' => Input::get('kode_kelas'),
			'jam_pelajaran' => Input::get('jam_pelajaran'),
			'kode_mapel' => Input::get('kode_mapel'),
			'status' => Input::get('status'),
			'tanggal_absen' => Input::get('tanggal_absen'),
		);
		$vdata = $this->validatorData($data);
		if($vdata->passes()){
			$absen->save();
			return redirect()->back()->with('message', 'Absen Berhasil Disimpan');
		}else{
			return redirect()->back()->with('error', 'Absen Gagal Disimpan');	
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
