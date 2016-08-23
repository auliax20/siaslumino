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
use File;

class Bahanajarcontroller extends Controller
{
    public function index(){
		$bahan = Bahanajar::orderBy('nama_bahan', 'DESC')->get();
		return view('bahanajar.viewbahan')->with('bahan', $bahan);
	}
    public function viewEdit($id){
        $bahan = Bahanajar::where('id_bahan', $id)->first();
    	return view('bahanajar.editbahan')->with('bahan', $bahan);
    }
    protected function validatorData($data){
        $message = array('required'=>':attribute harus di isi','in'=>'File yang anda upload tidak di izinkan');
        return Validator::make($data, array(
            'nama_bahan' => 'required',
			'nip' => 'required',
			'kode_mapel' => 'required',
			'type' => 'required',
			'kode_kelas' => 'required',
			'dokumen' => 'required|in:doc,docx,xls,xlsx,ppt,pptx,mp4,3gp,flv,mkv,avi,mov,mpeg,mpeg2,jpg,bmp,png',
        ),$message);
    }
    protected function validatorDataE($data){
        $message = array('required'=>':attribute harus di isi','in'=>'File yang anda upload tidak di izinkan');
        return Validator::make($data, array(
            'nama_bahan' => 'required',
			'nip' => 'required',
			'kode_mapel' => 'required',
			'type' => 'required',
			'kode_kelas' => 'required',
			'dokumen' => 'in:doc,docx,xls,xlsx,ppt,pptx,mp4,3gp,flv,mkv,avi,mov,mpeg,mpeg2,jpg,bmp,png',
        ),$message);
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
            $name1 = $file->getClientOriginalExtension();
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
            	'dokumen' => $name1
            );
            $vdata = $this->validatorData($data);
            if($vdata->passes()){
                $bahan->save();
            	$request->file('filebahan')->move("uploads/",$name);
                return redirect()->to('bahanajar/view')->with('message','Bahan Ajar Berhasil Ditambahkan');
            }else{
            	$mes = $vdata->messages();
                return redirect()->back()->with('error',$mes);
            }
	}
        public function edit($id){
            $anip = explode(" ", Input::get('nip'));
            $nip = $anip[0];
            $akode = explode(" ", Input::get('kode_mapel'));
            $kode = $akode[0];
            $akodek = explode(" ", Input::get('kode_kelas'));
            $kodekelas = $akodek[0];
            $file = $request->file('filebahan');
            $name = $file->getClientOriginalName();
            $name1 = $file->getClientOriginalExtension();
            $bahan = Bahanajar::where('id_bahan',$id)->first();
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
            	'dokumen' => $name1
            );
            $vdata = $this->validatorDataE($data);
            if($vdata->passes()){
                $bahan->update();
            	$request->file('filebahan')->move("uploads/",$name);
                return redirect()->to('bahanajar/view')->with('message','Bahan Ajar Berhasil Dirubah');
            }else{
            	$mes = $vdata->messages();
                return redirect()->back()->with('error',$mes);
            }
        }
}
