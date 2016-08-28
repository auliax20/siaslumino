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
		return view('category.viewcategory')->with('category', $cat);
	}
	protected function validatorData($data){
		$message = array('required'=>'Data :attribute harus diisi');
        return Validator::make($data, array(
			'category' => 'required',
                        'status' => 'required',
        ),$message);
    }
	public function add(Request $request){
		$cat = new Blogcategory();
		$cat->category = $request->category;
		$cat->status = $request->status;
		$data = array('category' => $request->category,
                        'status' => $request->status
                    );
		$vdata = $this->validatorData($data);
		if($vdata->passes()){
			$cat->save();
			return redirect()->to('blog-manager/category/view')->with('message','Data berhasil Disimpan');
		}else{
			$mes = $vdata->messages();
			return redirect()->back()->with('error',$mes);
		}
	}
	public function viewEdit($id){
		$cat = Blogcategory::where('id_category',$id)->first();
		return view('category.editcategory')->with('category', $cat);	
	}
	public function edit(Request $request, $id){
		$cat = Blogcategory::where('id_category',$id)->first();
		$cat->category = $request->category;
                $cat->status = $request->status;
		$cat->update();
		return redirect()->to('blog-manager/category/view')->with('message','Data berhasil Dirubah');
	}
	public function delete($id){
		$cat = Blogcategory::where('id_category',$id)->first();
		$cat->delete();
		return redirect()->to('blog-manager/category/view')->with('message','Data berhasil Dihapus');
	}
}