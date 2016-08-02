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
Route::get('/siswa/searchajax', 'Muridcontroller@searchAjax');
Route::post('/siswa/inputsiswa', 'Muridcontroller@Tambahdata');
Route::post('/siswa/editsiswa/{username}', 'Muridcontroller@Editmurid');

Route::get('/guru/view', 'Gurucontroller@index');
Route::get('/guru', 'Gurucontroller@index');
Route::get('/guru/add','Gurucontroller@addform');
Route::get('/guru/edit/{username}', 'Gurucontroller@Viewedit');
Route::get('/guru/delete/{username}', 'Gurucontroller@delete');
Route::post('/guru/inputguru', 'Gurucontroller@add');
Route::post('/guru/editguru/{username}', 'Gurucontroller@update');

Route::get('/ortu/view', 'Ortucontroller@index');
Route::get('/ortu', 'Ortucontroller@index');
Route::get('/ortu/add', 'Ortucontroller@formadd');
Route::get('/ortu/edit/{kode}', 'Ortucontroller@viewedit');
Route::get('/ortu/delete/{kode}', 'Ortucontroller@delete');
Route::post('/ortu/inputortu', 'Ortucontroller@add');
Route::post('/ortu/editortu/{kode}', 'Ortucontroller@edit');

Route::get('/kelas/view', 'Kelascontroller@index');
Route::get('/kelas', 'Kelascontroller@index');
Route::get('/kelas/add', function () {
    return view('kelas.inputkelas');
});
Route::get('/kelas/edit/{kode_kelas}', 'Kelascontroller@Viewedit');
Route::get('/kelas/delete/{kode_kelas}', 'Kelascontroller@delete');
Route::post('/kelas/inputkelas', 'Kelascontroller@add');
Route::post('/kelas/editkelas/{kode_kelas}', 'Kelascontroller@edit');

Route::get('/buku/view', 'Bukucontroller@index');
Route::get('/buku', 'Bukucontroller@index');
Route::get('/buku/add', function () {
    return view('buku.inputbuku');
});
Route::get('/buku/edit/{buku}', 'Bukucontroller@Viewedit');
Route::get('/buku/delete/{buku}', 'Bukucontroller@delete');
Route::get('/buku/searchajax', 'Bukucontroller@searchAjax');
Route::post('/buku/inputbuku', 'Bukucontroller@add');
Route::post('/buku/editbuku/{buku}', 'Bukucontroller@edit');

Route::get('/mapel/view', 'Mapelcontroller@index');
Route::get('/mapel', 'Mapelcontroller@index');
Route::get('/mapel/add', function () {
    return view('mapel.inputmapel');
});
Route::get('/mapel/edit/{kode}', 'Mapelcontroller@viewedit');
Route::get('/mapel/delete/{kode}', 'Mapelcontroller@delete');
Route::post('/mapel/inputmapel', 'Mapelcontroller@add');
Route::post('/mapel/editmapel/{kode}', 'Mapelcontroller@update');

Route::get('/walas/view', 'Walascontroller@index');
Route::get('/walas', 'Walascontroller@index');
Route::get('/walas/add', 'Walascontroller@formadd');
Route::get('/walas/edit/{kode}', 'Walascontroller@viewedit');
Route::get('/walas/delete/{kode}', 'Walascontroller@delete');
Route::post('/walas/inputwalas', 'Walascontroller@add');
Route::post('/walas/editwalas/{kode}', 'Walascontroller@edit');

Route::get('/pustaka/pinjaman', function(){
	return view('pustaka.inputpinjaman');
});
Route::get('/pustaka', function(){
	return view('pustaka.inputpinjaman');
});
Route::post('/pustaka/inputpinjaman', 'Walascontroller@edit');
Route::post('login', 'Logincontroller@Aulogin');
