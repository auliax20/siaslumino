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
							<form role="form" method="POST" action="{{ asset('buku/editbuku/'.$buku->id_buku) }}">
                            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label>Kode Buku</label>
									<input class="form-control" placeholder="Kode Buku" name="kode_buku" value="{{ $buku->kode_buku }}">
								</div>
								<div class="form-group">
									<label>Nama Buku</label>
									<input class="form-control" placeholder="Nama Buku" name="nama_buku" value="{{ $buku->nama_buku }}">
								</div>
                                 <div class="form-group">
									<label>Pengarang</label>
									<input class="form-control" placeholder="Pengarang" name="pengarang" value="{{ $buku->pengarang }}">
								</div>
                                <div class="form-group">
									<label>Penerbit</label>
									<input class="form-control" placeholder="Penerbit" name="penerbit" value="{{ $buku->penerbit }}">
								</div>
                                <div class="form-group">
									<label>Jumlah</label>
									<input class="form-control" placeholder="Jumlah" name="jumlah" value="{{ $buku->jumlah}}">
								</div>	
								<div class="form-group">
									<button class="btn btn-primary">Submit</button>
								</div>				
						</form>
					</div>
				</div>
@stop