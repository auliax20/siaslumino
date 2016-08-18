<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use Input;
use DB;
use Redirect;

class Logincontroller extends Controller
{
    //
	public function Aulogin(){
		if(Auth::attempt(['username' => Input::get('username'), 'password' => Input::get('password')])){
			if(Auth::user()->level == 'admin'){
                            return redirect('/');
			}else{
                            return redirect('/');
			}	
		}else{
			echo"Login Failed";	
		}	
	}
        public function getLogout(){
            Auth::logout();
            Session::flush();
            return redirect('/');
        }
}
