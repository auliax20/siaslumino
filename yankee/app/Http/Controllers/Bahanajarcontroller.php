<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bahanajar;
use View;
use Input;
use DB;
use Redirect;

class Bahanajarcontroller extends Controller
{
    public function index(){
		$bahan = Bahanajar::orderBy('nama_bahan', 'DESC')->get();
		return view('bahanajar.viewbahan')->with('bahan', $bahan);
	}
	protected function validatorData($data)
    {
        return Validator::make($data, array(
            'nama_bahan' => 'required',
			'nip' => 'required',
			'kode_mapel' => 'required',
			'type' => 'required',
			'kode_kelas' => 'required',
			'file' => 'required|mimes:doc,docx,xls,xlsx,ppt,pptx,mp4,3gp,flv,mkv,avi,mov,mpeg,mpeg2,jpg,bmp,png',
        ));
    }
	public function add(Request $request){
		$anip = explode(" ", Input::get('nip'));
		$nip = $anip[0];
		$akode = explode(" ", Input::get('kode_mapel'));
		$kode = $akode[0];
		$akodek = explode(" ", Input::get('kode_kelas'));
		$kodekelas = $akodek[0];
		$file = $request->file('filebahan');
		$name = $file->getClientOriginalName();
		$bahan = new Bahanajar();
		$bahan->nama_bahan = Input::get('nama_bahan');
		$bahan->nip = $nip;
		$bahan->kode_mapel = $kode;
		$bahan->type = Input::get('type');
		$bahan->kode_kelas = $kodekelas;
		$bahan->file = $name;
		$data = array('nama_bahan' => 'required',
			'nip' => $nip,
			'kode_mapel' => $kode,
			'type' => $request->type,
			'kode_kelas' => $kodekelas,
			'file' => $name
		);
		$vdata = $this->validatorData($data);
		if($vdata->passes){
			$request->file('filebahan')->move("uploads/",$name);	
		}else{
				
		}
	}
}
