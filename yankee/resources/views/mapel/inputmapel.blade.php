@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
Input Mata Pelajaran
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
					<div class="panel-heading">Form Input Mata Pelajaran</div>
					<div class="panel-body">
						<div class="col-lg-12">
							<form role="form" method="POST" action="{{ asset('mapel/inputmapel') }}">
                            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label>Kode Mata Pelajaran</label>
									<input class="form-control" placeholder="Kode Mata Pelajaran" name="kode_mapel">
								</div>
								<div class="form-group">
									<label>Nama Mata Pelajaran</label>
									<input class="form-control" placeholder="Nama Mata Pelajaran" name="nama_mapel">
								</div>	
								<div class="form-group">
									<button class="btn btn-primary">Submit</button>
								</div>				
						</form>
					</div>
				</div>
@stop