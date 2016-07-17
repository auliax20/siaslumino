<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Input;
use DB;
use Redirect;

class Logincontroller extends Controller
{
    //
	public function Aulogin(){
		if(Auth::attempt(['username' => Input::get('username'), 'password' => Input::get('password')])){
			if(Auth::user()->level == 'admin'){
				echo"Paja Ko Admin";
			}else{
				echo"Manga paja ko disiko??";	
			}	
		}else{
			echo"Login Failed";	
		}	
	}
}
