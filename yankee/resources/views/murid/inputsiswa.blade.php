@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
Input Siswa
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
					<div class="panel-heading">Form Input Siswa</div>
					<div class="panel-body">
						<div class="col-lg-12">
							<form role="form" method="POST" action="{{ asset('siswa/inputsiswa') }}">
                            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label>NIS</label>
									<input class="form-control" placeholder="NIS" name="nis">
								</div>
								<div class="form-group">
									<label>Nama Lengkap</label>
									<input class="form-control" placeholder="Nama Lengkap" name="nama_murid">
								</div>
                                <div class="form-group">
									<label>Alamat Lengkap</label>
									<input class="form-control" placeholder="Alamat Lengkap" name="alamat_murid">
								</div>	
                                <div class="form-group">
									<label>Nomor HP</label>
									<input class="form-control" placeholder="Nomor HP" name="no_hp">
								</div>
                                <div class="form-group">
									<label>E-Mail</label>
									<input class="form-control" placeholder="E-Mail" name="email" type="email">
								</div>	
                                <div class="form-group">
									<label>Username</label>
									<input class="form-control" placeholder="Username" name="username" type="username">
								</div>							
								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control" placeholder="Password" name="password">
								</div>
								<div class="form-group">
									<label>Confirm Password</label>
									<input type="password" class="form-control" placeholder="Password" name="password_confirmation">
								</div>
								<div class="form-group">
									<button class="btn btn-primary">Submit</button>
								</div>				
						</form>
					</div>
				</div>

@stop