<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Buku;
use App\Trxpustaka;
use Carbon\Carbon;
use App\Siswa;
use App\Pustaka;
use View;
use Input;
use DB;
use Redirect;

class Trxpustakacontroller extends Controller
{
    public function kembaliBuku($idpinjam){
		$now = date('Y-m-d');
		$pustaka = Pustaka::where('id_pustaka', $idpinjam)->first();
		$pustaka->delete();
		return redirect()->back()->with('message','Buku berhasil dikembalikan');		
	}
}
