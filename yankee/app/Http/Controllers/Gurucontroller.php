<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Guru;
use App\Userr;
use View;
use Input;
use DB;
use Redirect;

class Gurucontroller extends Controller
{
	public function index(){
    	$data = Guru::orderBy('id_guru','DESC')->paginate(50);
		return view('guru.viewguru')->with('guru', $data);
	}
}
