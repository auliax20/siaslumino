<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Nilai;
use App\Option;
use View;
use Input;
use DB;
use Redirect;

class Nilaicontroller extends Controller
{
	protected function validatorData($data){
        return Validator::make($data, array(
            'nis' => 'required',
			'kode_mapel' => 'required',
			'jenis_nilai' => 'required',
			'nilai' => 'required',
			'nip' => 'required',
			'kode_kelas' => 'required',
        ));
    }
    public function add(){
		$anis = explode(" ", Input::get('nis'));
		$nis = $anis[0];
		$anip = explode(" ", Input::get('nip'));
		$nip = $anip[0];
		$amp = explode(" ", Input::get('kode_mapel'));
		$mp = $amp[0];
		$akk = explode(" ", Input::get('kode_kelas'));
		$kk = $akk[0];
		$data = array(
			'nis' => $nis,
			'kode_mapel' => $mp,
			'jenis_nilai' => Input::get('jenis_nilai'),
			'nilai' => Input::get('nilai'),
			'nip' => $nip,
			'kode_kelas' => $kk,
		);
		$ta = Option::orderBy('tahun_ajaran','DESC')->first();
		$nilai = new Nilai();
		$nilai->nis = $nis;
		$nilai->kode_mapel = $mp;
		$nilai->jenis_nilai = Input::get('jenis_nilai');
		$nilai->nilai = Input::get('nilai');
		$nilai->nip = $nip;
		$nilai->kode_kelas = $kk;
		$nilai->tahun_ajaran = $ta->tahun_ajaran;
		$vdata = $this->validatorData($data);
		if($vdata->passes()){
			$nilai->save();
			return redirect()->back()->with('message', 'Nilai Berhasil Disimpan');
		}else{
			$mes = $vdata->messages();
			return redirect()->back()->with('error', $mes);
		}
	}
	public function filterByKelas(){
		$tah = Option::orderBy('tahun_ajaran','DESC')->first();
		$ta = $tah->tahun_ajaran;
		$mapel = Nilai::distinct()->select('kode_mapel')->groupBy('kode_mapel')->with('Consolemapel')->get();
		return view('nilai.viewrekapkelas')->with('mapel',$mapel);
	}
	public function filterByNis(){
		$ta = Option::orderBy('tahun_ajaran','DESC')->first();
		$nilai = Nilai::where('nis',Input::get('nis'))
					->andwhere('tahun_ajaran', $ta->tahun_ajaran)->get();
		return view('nilai.viewnilai')->with('nilai',$nilai);
	}
	public function filterByMapel(){
		$ta = Option::orderBy('tahun_ajaran','DESC')->first();
		$nilai = Nilai::where('kode_mapel',Input::get('kode_mapel'))
					->andwhere('tahun_ajaran', $ta->tahun_ajaran)->get();
		return view('nilai.viewnilai')->with('nilai',$nilai);
	}
}
