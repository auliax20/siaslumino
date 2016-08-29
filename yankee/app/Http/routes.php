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
Route::get('/', function(){
    return view('home');
});
Route::group(array('middleware'=>'web'),function(){
    Route::auth();
});
Route::group(array('middleware'=>array('auth')),  function (){
    Route::get('admin', function () {
        return view('backend');
    });
    Route::get('/admin',  function (){
        if(Auth::user()->level=='admin'){
            return view('backend');
        }else{
            return view('login');
        }
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
            Route::get('/guru/searchajax', 'Gurucontroller@searchAjax');
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
            Route::get('/kelas/searchajax', 'Kelascontroller@searchAjax');
            Route::post('/kelas/inputkelas', 'Kelascontroller@add');
            Route::post('/kelas/editkelas/{kode_kelas}', 'Kelascontroller@edit');
			
			Route::get('/lokal/add', function () {
                return view('lokal.inputlokal');
            });
			Route::get('/lokal/filterbynis', function () {
                return view('lokal.bynis');
            });
			Route::get('/lokal/filterbykelas', function () {
                return view('lokal.bykelas');
            });
			Route::get('/lokal/view', 'Lokalcontroller@index');
			Route::get('/lokal/', 'Lokalcontroller@index');
			Route::get('/lokal/edit/{id}', 'Lokalcontroller@viewedit');
			Route::get('/lokal/delete/{id}', 'Lokalcontroller@delete');
			Route::post('/lokal/acedit/{id}', 'Lokalcontroller@edit');
			Route::post('/lokal/acfilterbynis', 'Lokalcontroller@byNis');
			Route::post('/lokal/acfilterbylokal', 'Lokalcontroller@byKelas');
			Route::post('/lokal/inputlokal', 'Lokalcontroller@add');
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
            Route::get('/mapel/searchajax', 'Mapelcontroller@searchAjax');
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
            Route::get('/pustaka/filternis', function(){
            	return view('pustaka.filterbynis');
            });
            Route::get('/pustaka/filterbuku', function(){
            	return view('pustaka.filterbybuku');
            });
            Route::get('/pustaka/view/lewathari', 'Pustakacontroller@viewPinjamanLewat');
            Route::get('/pustaka/view', 'Pustakacontroller@viewPinjaman');
            Route::post('/pustaka/inputpinjaman', 'Pustakacontroller@add');
            Route::post('/pustaka/filterbynis', 'Pustakacontroller@viewPinjamanSiswa');
            Route::post('/pustaka/filterbybuku', 'Pustakacontroller@viewPinjamanBuku');

            Route::get('/absensi', function(){
            	return view('absensi.inputabsensi');
            });
            Route::get('/absensi/add', function(){
            	return view('absensi.inputabsensi');
            });
            Route::get('/absensi/view', 'Absensicontroller@view');
            Route::get('/absensi/filterbynis', function(){
            	return view('absensi.filterbynis');
            });
            Route::get('/absensi/filterbytanggal', function(){
            	return view('absensi.filterbynistgl');
            });
            Route::get('/absensi/rekap/{kode}', 'Absensicontroller@rekapAbsensi');
            Route::post('/absensi/filterbynistgl', 'Absensicontroller@filterByNisTanggalr');
            Route::post('/absensi/inputabsensi', 'Absensicontroller@add');
            Route::post('/absensi/acfilterbynis', 'Absensicontroller@filterByNis');

            Route::get('/nilai/', function(){
            	return view('nilai.inputnilai');
            });
            Route::get('/nilai/input', function(){
            	return view('nilai.inputnilai');
            });
            Route::get('/nilai/rekap', 'Nilaicontroller@filterByKelas');
            Route::post('/nilai/inputnilai','Nilaicontroller@add');
			
            Route::get('/bahanajar/add', function(){
            	return view('bahanajar.inputbahan');
            });
            Route::get('/bahanajar/view', 'Bahanajarcontroller@index');
            Route::get('/bahanajar', 'Bahanajarcontroller@index');
            Route::get('/bahanajar/edit/{id}', 'Bahanajarcontroller@viewedit');
            Route::post('/bahanajar/inputbahanajar', 'Bahanajarcontroller@add');
            Route::post('/bahanajar/editbahanajar/{id}', 'Bahanajarcontroller@edit');
            Route::get('/blog-manager/post', 'Blogpostcontroller@sadd');
			Route::post('/blog-manager/post/inputpost', 'Blogpostcontroller@add');
			Route::post('/blog-manager/post/view', 'Blogpostcontroller@index');
            Route::get('/blog-manager/category/add', function(){
            	return view('category.inputcategory');
            });
            Route::get('/blog-manager/category/view', 'Blogcategorycontroller@index');
            Route::get('/blog-manager/category', 'Blogcategorycontroller@index');
            Route::get('/blog-manager/category/edit/{id}', 'Blogcategorycontroller@viewEdit');
            Route::get('/blog-manager/category/delete/{id}', 'Blogcategorycontroller@delete');
            Route::post('/blog-manager/category/inputcategory', 'Blogcategorycontroller@add');
            Route::post('/blog-manager/category/editac/{id}', 'Blogcategorycontroller@edit');
            
});
Route::post('login', 'Logincontroller@Aulogin');
Route::get('logout', 'Logincontroller@getLogout');
