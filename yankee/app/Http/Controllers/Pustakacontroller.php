<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Buku;
use Carbon\Carbon;
use App\Siswa;
use App\Pustaka;
use View;
use Input;
use DB;
use Redirect;

class Pustakacontroller extends Controller
{
	public function add(){
		$abuku = explode(" ",Input::get('kode_buku'));
		$anis = explode(" ",Input::get('nis'));
		$kbuku = $abuku[0];
		$knis = $anis[0];
		$lamapinjam = Input::get('top');
		$jbuku = Buku::where('kode_buku', $kbuku)->first();
		echo $jbuku->jumlah;
		$jpinj = Pustaka::where('kode_buku', $kbuku)->get()->count();
		if($jpinj < $jbuku->jumlah){
			$now = Carbon::now();
			$kem = Carbon::now();
			$kembali = $kem->addDays($lamapinjam);
			$pustaka = new Pustaka();
			$pustaka->nis = $knis;
			$pustaka->kode_buku = $kbuku;
			$pustaka->tanggal_pinjam = $now->toDateString();
			$pustaka->tanggal_batas = $kembali->toDateString();
			$pustaka->save();
			return redirect()->back()->with('message','Data Pinjaman Berhasil Disimpan');	
		}else{
			return redirect()->back()->with('error','Buku Kosong');	
		}
	}
	public function viewPinjaman(){
		$pustaka = Pustaka::orderBy('tanggal_batas','DESC')->get();
		return view('pustaka.viewpinjaman')->with('pustaka',$pustaka);	
	}
	public function viewPinjamanLewat(){
		$now = date('Y-m-d');
		$pustaka = Pustaka::where('tanggal_batas','<',$now)->get();
		return view('pustaka.viewpinjaman')->with('pustaka',$pustaka);	
	}
	public function viewPinjamanSiswa(){
		$anis = explode(" ",Input::get('nis'));
		$nis = $anis[0];
		$pustaka = Pustaka::where('nis',$nis)->get();
		return view('pustaka.viewpinjaman')->with('pustaka',$pustaka);	
	}
	public function viewPinjamanBuku(){
		$abuku = explode(" ",Input::get('kode_buku'));
		$buku = $abuku[0];
		$pustaka = Pustaka::where('kode_buku',$buku)->get();
<<<<<<< HEAD
		return redirect()->to('pustaka.viewpustaka')->with('pustaka',$pustaka);		
	}
	public function kembaliBuku($idpinjam){
		$now = date('Y-m-d');
		$pustaka = Pustaka::where('id_pustaka', $idpinjam)->first();
		$pustaka->delete();
		return redirect()->to('pustaka.viewpustaka')->with('message','Buku berhasil dikembalikan');		
	}
	
=======
		return view('pustaka.viewpinjaman')->with('pustaka',$pustaka);		
	}	
>>>>>>> df4501d452c5129924dd30226b93b8325cb0a2dc
}
