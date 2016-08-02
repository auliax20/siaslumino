<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Buku;
use App\Siswa;
use View;
use Input;
use DB;
use Redirect;

class Pustakacontroller extends Controller
{
	public function add(){
		$abuku = explode(" ",Input::get('kode_buku'));
		$kbuku = $abuku[0];
		$jbuku = Buku::where('kode_buku',$kbuku)->first();
		$jpinj = Pustaka::where('kode_buku',$kbuku)->get()->count();
		if($jpinj < $jbuku){
			//add query
		}else{
			return redirect()->back()->with('error','Buku Kosong');	
		}
	}
	public function viewPinjaman(){
		$pustaka = Pustaka::orderBy('tanggal_batas','DESC')->get();
		return redirect()->to('pustaka.viewpustaka')->with('pustaka',$pustaka);	
	}
	public function viewPinjamanLewat(){
		$now = date(Y-m-d);
		$pustaka = Pustaka::where('tanggal_batas','<',$now)->get();
		return redirect()->to('pustaka.viewpustaka')->with('pustaka',$pustaka);	
	}
	public function viewPinjamanSiswa($nis){
		$pustaka = Pustaka::where('nis',$nis)->get();
		return redirect()->to('pustaka.viewpustaka')->with('pustaka',$pustaka);	
	}
	public function viewPinjamanBuku($buku){
		$pustaka = Pustaka::where('kode_buku',$buku)->get();
		return redirect()->to('pustaka.viewpustaka')->with('pustaka',$pustaka);		
	}
	public function kembaliBuku($idpinjam){
		$now = date(Y-m-d);
		$pustaka = Pustaka::where('id_pustaka', $idpinjam)->first();
		$pustaka->delete();
		return redirect()->to('pustaka.viewpustaka')->with('message','Buku berhasil dikembalikan');		
	}
	
}
