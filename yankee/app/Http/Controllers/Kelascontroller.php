<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Kelas;
use View;
use Input;
use DB;
use Redirect;

class Kelascontroller extends Controller
{
    public function index(){
		$kelas = Kelas::orderBy('id_kelas','DESC');
		return view('kelas.viewkelas')->with('kelas', $kelas);	
	}
	public function viewedit($id){
		$kelas = Kelas::where('id_kelas', $id)->first();
		return view('kelas.viewedit')->with('kelas', $kelas);	
	}
	public function add(){
		$kelas = new Kelas();
		$kelas->kode_kelas = Input::get('kode_kelas');
		$kelas->nama_kelas = Input::get('nama_kelas');
		$kelas->kapasitas = Input::get('kapasitas');
		$kelas->save();
		return redirect()->to('/kelas/view')->with('message','Kelas Berhasil Ditambahkan');	
	}
	public function edit($id){
		$kelas = Kelas::where('id_kelas',$id)->first();
		$kelas->kode_kelas = Input::get('kode_kelas');
		$kelas->nama_kelas = Input::get('nama_kelas');
		$kelas->kapasitas = Input::get('kapasitas');
		$kelas->update();
		return redirect()->to('/kelas/view')->with('message','Kelas Berhasil Diubah');	
	}
	public function delete($id){
		$kelas = Kelas::where('id_kelas',$id)->first;
		$kelas->delete();
		return redirect()->to('/kelas/view')->with('message','Kelas Berhasil Dihapus');	
	}
}
