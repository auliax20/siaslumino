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
	public function add(Request $request){
		$post = Blogpost::where('id_post',$request->id_post)->first();
		if($post->status=="show"){
			$comment = new Blogcomment();		
			$comment->comment = $request->comment;
			$comment->date_comment = Carbon::now();
		}else{
			
		}	
	}
}
?>