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
		//$pustaka->delete();
		//return redirect()->back()->with('message','Buku berhasil dikembalikan');
		$opt = Option::orderBy('tahun_ajaran','DESC')->get();
		$denda = $opt->denda;
		$batas = Carbon::parse($pustaka->tanggal_batas);
		$now = Carbon::now();
		$lewat = $now->diffInDays($batas);
		$tdenda = $denda * $lewat;
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
		return view()->with('trx', $trx);
	}
	public function viewDataBynis(){
		$trx = Trxpustaka::where('nis',$nis)->get();
		return view()->with('trx', $trx);
	}
	public function viewDataBybuku(){
		$trx = Trxpustaka::where('kode_buku',$nis)->get();
		return view()->with('trx', $trx);
	}
}
