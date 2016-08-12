<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Absensi;
use App\Murid;
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
	public function view(){
		$ta = Option::orderBy('tahun_ajaran','DESC')->first();
		$absensi = Absensi::orderBy('tanggal_absen','DESC')->get();
		return view('absensi.viewabsensi')->with('absensi',$absensi);
	}
	public function filterByNis(){
		$nnis = explode(" ", Input::get('nis'));
		$anis =$nnis[0];
		$ta = Option::orderBy('tahun_ajaran','DESC')->first();
		$absensi = Absensi::where('nis', $anis)->get();
		return view('absensi.viewabsensi')->with('absensi',$absensi);
	}
	public function filterByNisTanggal(){
		$nnis = explode(" ", Input::get('nis'));
		$anis =$nnis[0];
		$ta = Option::orderBy('tahun_ajaran','DESC')->first();
		$absensi = Absensi::where('nis', $anis)
					->whereBetween('tanggal_absen',array(Input::get('tanggal1'),Input::get('tanggal2')))
					->get();
		return view('absensi.viewabsensi')->with('absensi',$absensi);
	}
	
	public function rekapAbsensi($kode){
		//$kk = explode(Input::get('kode_kelas'));
		//$kode = $kk[0];
		$absen = DB::select('SELECT DISTINCT nis FROM absensi WHERE kode_kelas= :kode',['kode'=>$kode]);
		$zz = array();
		foreach($absen as $data => $siswa){
			$ssiswa = Murid::where('nis', $siswa->nis)->first();
			$nis = $siswa->nis;
			$hadir = DB::select('SELECT COUNT(status) as hadir FROM absensi WHERE kode_kelas= :kode AND nis= :nis AND status= :status',['kode'=>$kode, 'nis'=>$nis, 'status'=>'hadir']);
			$stat = json_decode(json_encode($hadir),true);
			$siswa->hadir = $stat[0]['hadir'];
			$hadir = DB::select('SELECT COUNT(status) as izin FROM absensi WHERE kode_kelas= :kode AND nis= :nis AND status= :status',['kode'=>$kode, 'nis'=>$nis, 'status'=>'izin']);
			$stat = json_decode(json_encode($hadir),true);
			$siswa->izin = $stat[0]['izin'];
			$hadir = DB::select('SELECT COUNT(status) as sakit FROM absensi WHERE kode_kelas= :kode AND nis= :nis AND status= :status',['kode'=>$kode, 'nis'=>$nis, 'status'=>'sakit']);
			$stat = json_decode(json_encode($hadir),true);
			$siswa->sakit = $stat[0]['sakit'];
			$hadir = DB::select('SELECT COUNT(status) as alfa FROM absensi WHERE kode_kelas= :kode AND nis= :nis AND status= :status',['kode'=>$kode, 'nis'=>$nis, 'status'=>'alfa']);
			$stat = json_decode(json_encode($hadir),true);
			$siswa->alfa = $stat[0]['alfa'];
			$hadir = DB::select('SELECT COUNT(status) as cabut FROM absensi WHERE kode_kelas= :kode AND nis= :nis AND status= :status',['kode'=>$kode, 'nis'=>$nis, 'status'=>'cabut']);
			$stat = json_decode(json_encode($hadir),true);
			$siswa->cabut = $stat[0]['cabut'];
			$siswa->nama = $ssiswa->nama_murid;
			$zz[] = $siswa;
		}
		$storage = (object) $zz;
		return view('absensi.viewrekapabsensi')->with('data', $storage);
	}
	public function filterByNisTanggalr(){
		$nnis = explode(" ", Input::get('nis'));
		$anis = $nnis[0];
		//$anis = "123456689";
		//$tgl1 = "2016/08/11";
		//$tgl2 = "2016/08/11";
		$tgl1 = Input::get('tanggal1');
		$tgl2 = Input::get('tanggal2');
		$absen = DB::select('SELECT DISTINCT(nis) FROM absensi WHERE nis= :kode',['kode'=>$anis]);
		$zz = array();
		foreach($absen as $data => $siswa){
			$ssiswa = Murid::where('nis', $siswa->nis)->first();
			$nis = $siswa->nis;
			$hadir = DB::select('SELECT COUNT(status) as hadir FROM absensi WHERE tanggal_absen BETWEEN :tgl1 AND :tgl2 AND nis= :nis AND status= :status',['tgl1'=>$tgl1, 'tgl2'=>$tgl2, 'nis'=>$nis, 'status'=>'hadir']);
			$stat = json_decode(json_encode($hadir),true);
			$siswa->hadir = $stat[0]['hadir'];
			$hadir = DB::select('SELECT COUNT(status) as izin FROM absensi WHERE tanggal_absen BETWEEN :tgl1 AND :tgl2 AND nis= :nis AND status= :status',['tgl1'=>$tgl1, 'tgl2'=>$tgl2, 'nis'=>$nis, 'status'=>'izin']);
			$stat = json_decode(json_encode($hadir),true);
			$siswa->izin = $stat[0]['izin'];
			$hadir = DB::select('SELECT COUNT(status) as sakit FROM absensi WHERE tanggal_absen BETWEEN :tgl1 AND :tgl2 AND nis= :nis AND status= :status',['tgl1'=>$tgl1, 'tgl2'=>$tgl2, 'nis'=>$nis, 'status'=>'sakit']);
			$stat = json_decode(json_encode($hadir),true);
			$siswa->sakit = $stat[0]['sakit'];
			$hadir = DB::select('SELECT COUNT(status) as alfa FROM absensi WHERE tanggal_absen BETWEEN :tgl1 AND :tgl2 AND nis= :nis AND status= :status',['tgl1'=>$tgl1, 'tgl2'=>$tgl2, 'nis'=>$nis, 'status'=>'alfa']);
			$stat = json_decode(json_encode($hadir),true);
			$siswa->alfa = $stat[0]['alfa'];
			$hadir = DB::select('SELECT COUNT(status) as cabut FROM absensi WHERE tanggal_absen BETWEEN :tgl1 AND :tgl2 AND nis= :nis AND status= :status',['tgl1'=>$tgl1, 'tgl2'=>$tgl2, 'nis'=>$nis, 'status'=>'cabut']);
			$stat = json_decode(json_encode($hadir),true);
			$siswa->cabut = $stat[0]['cabut'];
			$siswa->nama = $ssiswa->nama_murid;
			$zz[] = $siswa;
		}
		$storage = (object) $zz;
		/*echo("<pre>");
		print_r($storage);
		echo("</pre>");*/
		return view('absensi.viewrekapabsensi')->with('data', $storage);
	}
}
