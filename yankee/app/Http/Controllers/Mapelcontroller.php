<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mapel;
use View;
use Input;
use DB;
use Redirect;

class Mapelcontroller extends Controller
{
    public function index(){
		$mapel = Mapel::orderBy('id_mapel','DESC')->paginate(50);
		return view('mapel.viewmapel')->with('mapel', $mapel);
	}
	public function viewedit($id){
		$mapel = Mapel::where('id_mapel',$id)->first();	
		return view('mapel.editmapel')->with('mapel',$mapel);
	}
	protected function validatorData($data){
        return Validator::make($data, array(
            'kode_mapel' => 'required|max:255|unique:mata_pelajaran',
			'nama_mapel' => 'required',
        ));
    }
	public function add(){
		$mapel = new Mapel();
		$mapel->kode_mapel = Input::get('kode_mapel');
		$mapel->nama_mapel = Input::get('nama_mapel');	
		$data = array(
			'kode_mapel' => Input::get('kode_mapel'),
			'nama_mapel' => Input::get('nama_mapel'),
		);
		$vdata = $this->validatorData($data);
		if($vdata->passes()){
			$mapel->save();
			return redirect()->to('/mapel/view')->with('message','Mata Pelajaran Berhasil Disimpan');	
		}else{
			$mes = $vdata->messages();	
			return redirect()->back()->with('error', $mes);	
		}
	}
	public function update($id){
		$mapel = Mapel::where('id_mapel', $id)->first();
		$mapel->kode_mapel = Input::get('kode_mapel');
		$mapel->nama_mapel = Input::get('nama_mapel');
		$mapel->update();
		return redirect()->to('/mapel/view')->with('message','Mata Pelajaran Dirubah');
	}
	public function delete($id){
		$mapel = Mapel::where('id_mapel',$id)->first();
		$mapel->delete();
		return redirect()->to('/mapel/view')->with('message','Mata Pelajaran Berhasil Dihapus');
	}
}
