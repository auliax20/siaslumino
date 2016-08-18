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
		$siswa = Nilai::distinct()->select('nis')->with('consolemurid')->get();
		$mapel = Nilai::distinct()->select('kode_mapel')->with('consolemapel')->get();
		$day = (object) array();
		foreach($siswa as $sis){
			foreach($mapel as $map){
				
				$uh1 = Nilai::where('jenis_nilai', 'uh1')
								->where('kode_mapel',$map->kode_mapel)
								->where('tahun_ajaran', $ta)
								->where('nis', $sis->nis)->first();
				$day->{$map->kode_mapel} = (object) array();
				$day->{$map->kode_mapel}->uh1 = $uh1->nilai;
				$uh2 = Nilai::where('jenis_nilai', 'uh2')
								->where('kode_mapel',$map->kode_mapel)
								->where('tahun_ajaran', $ta)
								->where('nis', $sis->nis)->first();
				if(!is_object($day->{$map->kode_mapel})){
					$day->{$map->kode_mapel} = (object) array();	
				}
				if(isset($uh2->nilai)){
					$day->{$map->kode_mapel}->uh2 = $uh2->nilai;
				}else{
					$day->{$map->kode_mapel}->uh2 = 0;	
				}
				$mid = Nilai::where('jenis_nilai', 'mid')
								->where('kode_mapel',$map->kode_mapel)
								->where('tahun_ajaran', $ta)
								->where('nis', $sis->nis)->first();
				if(!is_object($day->{$map->kode_mapel})){
					$day->{$map->kode_mapel} = (object) array();	
				}
				if(isset($mid->nilai)){
					$day->{$map->kode_mapel}->mid = $mid->nilai;
				}else{
					$day->{$map->kode_mapel}->mid = 0;	
				}
				$uh3 = Nilai::where('jenis_nilai', 'uh3')
								->where('kode_mapel',$map->kode_mapel)
								->where('tahun_ajaran', $ta)
								->where('nis', $sis->nis)->first();
				if(!is_object($day->{$map->kode_mapel})){
					$day->{$map->kode_mapel} = (object) array();	
				}
				if(isset($uh3->nilai)){
					$day->{$map->kode_mapel}->uh3 = $uh3->nilai;
				}else{
					$day->{$map->kode_mapel}->uh3 = 0;	
				}
				$uh4 = Nilai::where('jenis_nilai', 'uh4')
								->where('kode_mapel',$map->kode_mapel)
								->where('tahun_ajaran', $ta)
								->where('nis', $sis->nis)->first();
				if(!is_object($day->{$map->kode_mapel})){
					$day->{$map->kode_mapel} = (object) array();	
				}
				if(isset($uh4->nilai)){
					$day->{$map->kode_mapel}->uh4 = $uh4->nilai;
				}else{
					$day->{$map->kode_mapel}->uh4 = 0;	
				}
				$rapor = Nilai::where('jenis_nilai', 'rapor')
								->where('kode_mapel',$map->kode_mapel)
								->where('tahun_ajaran', $ta)
								->where('nis', $sis->nis)->first();
				if(!is_object($day->{$map->kode_mapel})){
					$day->{$map->kode_mapel} = (object) array();	
				}
				if(isset($rapor->nilai)){
					$day->{$map->kode_mapel}->rapor = $rapor->nilai;
				}else{
					$day->{$map->kode_mapel}->rapor = 0;	
				}
			}	
		}
		//foreach($mapel as $mp){
			//$day->{$mp->kode_mapel} = $mp->consolemapel->nama_mapel; 	
		//	$nilaiuh1 = Nilai::select('SELECT uh1 FROM nilai WHERE ');
		//}
		//echo("<pre>");
		//	print_r($day);
		//echo("<pre>");
		return view('nilai.viewrekapnilai')->with('mapel',$mapel)->with('siswa',$siswa)->with('rekap',$day);
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
