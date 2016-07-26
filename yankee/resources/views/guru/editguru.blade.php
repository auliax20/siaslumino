@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
Edit Siswa
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
					<div class="panel-heading">Form Edit Siswa</div>
					<div class="panel-body">
						<div class="col-lg-12">
							<form role="form" method="POST" action="{{ asset('guru/editguru/'.$siswa->username) }}">
                            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label>NIP</label>
									<input class="form-control" placeholder="NIP" name="nip" value="{{ $siswa->nip}}">
								</div>
								<div class="form-group">
									<label>Nama Lengkap</label>
									<input class="form-control" placeholder="Nama Lengkap" name="nama_guru" value="{{ $siswa->nama_guru}}">
								</div>
                                <div class="form-group">
									<label>Alamat Lengkap</label>
									<input class="form-control" placeholder="Alamat Lengkap" name="alamat_murid" value="{{ $siswa->alamat_murid}}">
								</div>	
                                <div class="form-group">
									<label>Nomor HP</label>
									<input class="form-control" placeholder="Nomor HP" name="no_hp" value="{{ $siswa->no_hp}}">
								</div>
								<div class="form-group">
									<button class="btn btn-primary">Submit</button>
								</div>				
						</form>
					</div>
				</div>

@stop