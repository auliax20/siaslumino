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
		return view('')->with();
	}
}
