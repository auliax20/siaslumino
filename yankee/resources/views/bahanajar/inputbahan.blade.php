@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
Input Bahan Ajar
@stop
@section('panel')
@if (session('error'))
    <div class="alert bg-danger">
        {{ session('error') }}
    </div>
@endif
@if (session('message'))
    <div class="alert bg-primary">
        {{ session('message') }}
    </div>
@endif
<div class="panel panel-default">
					<div class="panel-heading">Form Input Bahan Ajar</div>
					<div class="panel-body">
						<div class="col-lg-12">
							<form role="form" method="POST" action="{{ asset('bahanajar/inputbahanajar') }}" enctype="multipart/form-data">
                            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label>Nama Bahan Ajar</label>
									<input class="form-control" placeholder="Nama Bahan Ajar" name="nama_bahan">
								</div>
								<div class="form-group">
									<label>NIP</label>
									<input class="form-control" placeholder="Ketikkan NIP / Nama Guru" name="nip" id="nip">
								</div>
                                <div class="form-group">
									<label>Kelas</label>
									<input class="form-control" placeholder="Ketikkan Nama Kelas / Kode kelas" name="kode_kelas" id="kelas">
								</div>
                                <div class="form-group">
									<label>Mata pelarajan</label>
									<input class="form-control" placeholder="Ketikkan Mata Pelajaran / Kode Mata Pelajaran" name="kode_mapel" id="kode_mapel">
								</div>
                                <div class="form-group">
									<label>Type</label>
									<select class="form-control" name="type">
                                    	<option value=""> - Pilih Type Bahan Ajar - </option>
                                        <option value="text">Text</option>
                                        <option value="video">Video</option>
                                    </select>
								</div>
                                <div class="form-group">
									<label>File bahan</label>
									<input class="form-control" placeholder="Jumlah" name="jumlah" type="file">
								</div>	
								<div class="form-group">
									<button class="btn btn-primary">Submit</button>
								</div>				
						</form>
					</div>
				</div>
@stop