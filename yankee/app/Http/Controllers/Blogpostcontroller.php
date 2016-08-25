<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Blogpost;
use View;
use Input;
use DB;
use Redirect;

class Blogpostcontroller extends Controller
{
    public function index(){
		$post = Blogpost::orderBy('date_post', 'DESC')->get();
		return view('post.viewpost')->with('post', $post);
	}
	protected function validatorData($data){
		$message = array('required'=>'Data :attribute harus diisi');
        return Validator::make($data, array(
			'title'=>'required', 
			'post'=>'required'
        ),$message);
    }
	public function add(Request $request){
		$post = new Blogpost();
		$data = array(
			'title'=>$request->title, 
			'post'=>$request->post
		);
		$vdata = $this->validatorData($data);
		if($vdata->passes()){
			$post->title = $request->title;
			$post->post = $request->post;
			$post->id_category = $request->id_category;
			$post->featured = 'not-featured';
			$post->status = 'show';
			$post->date_post = Carbon::now();
			$post->save();
			return redirect()->to('post/view')->with('message', 'Tulisan Berhasil Disimpan');
		}else{
			$mes = $vdata->messages();
			return redirect()->back()->with('error', $mes);	
		}
	}
	public function viewEdit($id){
		$post = Blogpost::where('id_post', $id)->first();
		return view('post.editpost')->with('post', $post);
	}
	public function edit(Request $request, $id){
		$post = Blogpost::where('id_post', $id)->first();
		$post->title = $request->title;
		$post->post = $request->post;
		$post->category = $request->category;
		$post->update();
		return redirect()->to('post/view')->with('message', 'Data berhasil dirubah');
	}
	public function delete($id){
		$post = Blogpost::where('id_post', $id)->first();	
		$post->delete();
		return redirect()->to('post/view')->with('message', 'Data berhasil dihapus');
	}
	public function filterCategory($id){
		$post = Blogpost::where('id_category', $id)->orderBy('date_post', 'DESC')->get();
		return view('post.viewpost')->with('post', $post);
	}
	public function readPost($id){
		$post = Blogpost::where('id_post', $id)->first();
		return view('post.readpost')->with('post', $post);
	}
	public function changeStatus($id){
		$post = Blogpost::where('id_post', $id)->first();
		$post->status = $request->status;
		$post->update();
	}
	public function toogleFeatured($id){
		$post = Blogpost::where('id_post', $id)->first();
		if($post->featured == "not-featured"){
			$post->featured = "featured";	
			$post->update();
		}else{
			$post->featured = "not-featured";
			$post->update();	
		}
		return redirect()->to('post/view')->with('message', 'Post Berhasil Tampil Di Halaman Depan');
	}
}
