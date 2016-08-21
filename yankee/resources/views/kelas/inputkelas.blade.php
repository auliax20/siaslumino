@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
Input Kelas
@stop
@section('panel')
@if(session('errors'))
    <div class="alert bg-danger">
        {{ session('errors') }}
    </div>
@endif
@if(session('message'))
    <div class="alert bg-primary">
        {{ session('message') }}
    </div>
@endif
<div class="panel panel-default">
					<div class="panel-heading">Form Input Kelas</div>
					<div class="panel-body">
						<div class="col-lg-12">
							<form role="form" method="POST" action="{{ asset('kelas/inputkelas') }}">
                            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label>Kode Kelas</label>
									<input class="form-control" placeholder="Kode Kelas" name="kode_kelas">
								</div>
								<div class="form-group">
									<label>Nama Kelas</label>
									<input class="form-control" placeholder="Nama Kelas" name="nama_kelas">
								</div>
                                <div class="form-group">
									<label>Kapasitas</label>
									<input class="form-control" placeholder="Kapasitas" name="kapasitas">
								</div>	
								<div class="form-group">
									<button class="btn btn-primary">Submit</button>
								</div>				
						</form>
					</div>
				</div>
@stop