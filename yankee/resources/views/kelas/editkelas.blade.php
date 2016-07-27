@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
Edit Kelas
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
					<div class="panel-heading">Form Edit Kelas</div>
					<div class="panel-body">
						<div class="col-lg-12">
							<form role="form" method="POST" action="{{ asset('kelas/editkelas/'.$kelas->id_kelas) }}">
                            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label>Kode Kelas</label>
									<input class="form-control" placeholder="Kode Kelas" name="kode_kelas" value="{{ $kelas->kode_kelas }}">
								</div>
								<div class="form-group">
									<label>Nama Kelas</label>
									<input class="form-control" placeholder="Nama Kelas" name="nama_kelas" value="{{ $kelas->nama_kelas }}">
								</div>
                                <div class="form-group">
									<label>Kapasitas</label>
									<input class="form-control" placeholder="Kapasitas" name="kapasitas" value="{{ $kelas->kapasitas}}">
								</div>	
								<div class="form-group">
									<button class="btn btn-primary">Submit</button>
								</div>				
						</form>
					</div>
				</div>
@stop