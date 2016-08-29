<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Blogpost;
use App\Blogcomment;
use View;
use Input;
use DB;
use Redirect;

class Blogcommentcontroller extends Controller
{
    public function index(){
		$comment = Blogcomment::orderBy('date_comment', 'DESC')->paginate(25);
		return view('comment.viewcomment')->with('comment', $comment);
	}
	protected function validatorData($data){
		$message = array('required'=>'Data :attribute harus diisi');
        return Validator::make($data, array(
			'id_post'=>'required', 
			'post'=>'required'
        ),$message);
    }
	public function add(Request $request){
		$post = Blogpost::where('id_post',$request->id_post)->first();
		if($post->status=="show"){
			$data = array(
				"id_post" => $request->id_post,
				"comment" => $request->comment				
			);
			$vdata = $this->validatorData($data);
			if($vdata->passes()){
				$comment = new Blogcomment();
				$comment->id_post = $request->id_post;		
				$comment->comment = $request->comment;
				$comment->date_comment = Carbon::now();	
				$comment->save();
				return redirect()->back()->with('message', 'Berhasil ditambahkan');	
			}else{
				$mes = $vdata->messages();
				return redirect()->back()->with('error', $mes);	
			}
		}else{
			
		}	
	}
	public function edit(Request $request, $id){
		$comment = Blogcomment::where('id_comment', $id)->first();
		$comment->comment = $request->comment;
		$comment->update();
		return redirect()->back()->with('message', 'Berhasil dirubah');	
	}
	public function viewEdit($id){
		$comment = Blogcomment::where('id_comment', $id)->first();
		return view('comment.editcomment')->with('comment', $comment);	
	}
	public function delete($id){
		$comment = Blogcomment::where('id_comment', $id)->first();
		$comment->delete();
		return redirect()->back()->with('message', 'Data berhasil dihapus');
	}
	public function changeStatus($id){
		$comment = Blogcomment::where('id_comment', $id)->first();
		if($comment->status == "not-show"){
			$comment->status = "show";
		}else{
			$comment->status = "not-show";	
		}
		return redirect()->back()->with('message', 'Status berhasil dirubah');
	}
}
?>