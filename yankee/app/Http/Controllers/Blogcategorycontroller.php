<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Blogcategory;
use View;
use Input;
use DB;
use Redirect;

class Blogcategorycontroller extends Controller
{
    public function index(){
		$cat = Blogcategory::orderBy('category', 'DESC')->get();	
		return view('blogcategory.viewcategory')->with('category', $cat);
	}
	protected function validatorData($data){
		$message = array('required'=>'Data :attribute harus diisi');
        return Validator::make($data, array(
			'category' => 'required',
        ),$message);
    }
	public function add(Request $request){
		$cat = new Blogcategory();
		$cat->category = $request->category;
		$cat->status = 'disable';
		$data = array('category'=>$request->category);
		$vdata = $this->validatorData($data);
		if($vdata->passes()){
			$cat->save();
			return redirect()->to('blogcat/view')->with('message','Data berhasil Disimpan');
		}else{
			$mes = $vdata->messages();
			return redirect()->back()->with('error',$mes);
		}
	}
	public function viewEdit($id){
		$cat = Blogcategory::where('id_category',$id)->first();
		return view('blogcat/edit')->with('category', $cat);	
	}
	public function edit(Request $request, $id){
		$cat = Blogcategory::where('id_category',$id)->first();
		$cat->category = $request->category;
		$cat->edit();
		return redirect()->to('blogcat/view')->with('message','Data berhasil Dirubah');
	}
	public function delete($id){
		$cat = Blogcategory::where('id_category',$id)->first();
		$cat->delete();
		return redirect()->to('blogcat/view')->with('message','Data berhasil Dihapus');
	}
}