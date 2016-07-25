<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('login');
});
Route::get('home', function () {
    return view('home');
});
Route::get('/siswa/add', function () {
    return view('murid.inputsiswa');
});
Route::get('/siswa/edit/{username}', 'Muridcontroller@Vieweditmurid');
Route::get('/siswa/view', 'Muridcontroller@Viewmurid');
Route::get('/siswa', 'Muridcontroller@Viewmurid');
Route::get('/siswa/delete/{username}', 'Muridcontroller@Deletemurid');
Route::post('/siswa/inputsiswa', 'Muridcontroller@Tambahdata');
Route::post('login', 'Logincontroller@Aulogin');
Route::post('/siswa/editsiswa/{username}', 'Muridcontroller@Editmurid');
