<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Buku;
use App\Trxpustaka;
use Carbon\Carbon;
use App\Siswa;
use App\Option;
use App\Pustaka;
use View;
use Input;
use DB;
use Redirect;

class Trxpustakacontroller extends Controller
{
    public function kembaliBuku($idpinjam){
		$pustaka = Pustaka::where('id_pustaka', $idpinjam)->first();
		$opt = Option::orderBy('tahun_ajaran','DESC')->first();
		$denda = $opt->denda;
		$batas = Carbon::parse($pustaka->tanggal_batas);
		$now = Carbon::now();
		$lewat = $now->diffInDays($batas);
		if($lewat > 0){
			$tdenda = $denda * $lewat;	
		}else{
			$tdenda = 0;	
		}
		$trx = new Trxpustaka();
		$trx->tanggal_batas = $pustaka->tanggal_batas;
		$trx->tanggal_kembali = $now;
		$trx->nis = $pustaka->nis;
		$trx->kode_buku = $pustaka->kode_buku;
		$trx->total_denda =  $tdenda;
		$trx->save();
		$pustaka->delete();
		return redirect()->back()->with('message','Buku berhasil dikembalikan');
	}
	public function viewData(){
		$trx = Trxpustaka::orderBy('tanggal_kembali', 'DESC')->get();
		return view('pustaka.viewtrxpin')->with('trx', $trx);
	}
	public function viewDataBynis(){
		$anis = explode(" ",Input::get('nis'));
		$nis = $anis[0];
		$trx = Trxpustaka::where('nis',$nis)->get();
		return view('pustaka.viewtrxpin')->with('trx', $trx);
	}
	public function viewDataBybuku(){
		$akode = explode(" ",Input::get('kode_buku'));
		$kode = $akode[0];
		$trx = Trxpustaka::where('kode_buku',$kode)->get();
		return view('pustaka.viewtrxpin')->with('trx', $trx);
	}
}