<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Buku;
use View;
use Input;
use DB;
use Redirect;

class Bukucontroller extends Controller
{
    public function index(){
		$buku = Buku::orderBy('id_buku','DESC')->get();
		return view('buku.viewbuku')->with('buku',$buku);
	}
	public function viewedit($id){
		$view = Buku::where('id_buku',$id)->first();
		return view('buku.editbuku')->with('buku', $view);
	}
	protected function validatorData($data){
        return Validator::make($data, array(
            'kode_buku' => 'required|max:255|unique:buku',
			'nama_buku' => 'required',
			'pengarang' => 'required',
			'penerbit' => 'required',
			'jumlah' => 'required',
        ));
    }
	public function add(){
		$buku = new Buku();
		$buku->kode_buku = Input::get('kode_buku');
		$buku->nama_buku = Input::get('nama_buku');
		$buku->pengarang = Input::get('pengarang');
		$buku->penerbit = Input::get('penerbit');	
		$buku->jumlah = Input::get('jumlah');
		$data = array(
			'kode_buku' => Input::get('kode_buku'),
			'nama_buku' => Input::get('nama_buku'),
			'pengarang' => Input::get('pengarang'),
			'penerbit' => Input::get('penerbit'),
			'jumlah' => Input::get('jumlah'),
		);
		$vdata = $this->validatorData($data);
		if($vdata->passes()){
			$buku->save();	
			return redirect()->to('buku/view')->with('message', 'Buku Berhasil Disimpan');
		}else{
			$mes = $vdata->messages();
			return redirect()->back()->with('error', $mes);	
		}
	}
	public function edit($id){
		$buku = Buku::where('id_buku',$id)->first();
		$buku->kode_buku = Input::get('kode_buku');
		$buku->nama_buku = Input::get('nama_buku');
		$buku->pengarang = Input::get('pengarang');
		$buku->penerbit = Input::get('penerbit');
		$buku->jumlah = Input::get('jumlah');
		$buku->update();
		return redirect()->to('buku/view')->with('message', 'Buku Berhasil Diubah');
	}
	public function delete($id){
		$buku = Buku::where('id_buku',$id)->first();
		$buku->delete();
		return redirect()->to('buku/view')->with('message', 'Buku Berhasil Dihapus');
	}
}
