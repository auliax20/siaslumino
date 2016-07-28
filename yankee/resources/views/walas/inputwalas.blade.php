@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
Input Wali Kelas
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
					<div class="panel-heading">Form Input Wali Kelas</div>
					<div class="panel-body">
						<div class="col-lg-12">
							<form role="form" method="POST" action="{{ asset('walas/inputwalas') }}">
                            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label>Guru</label>
									<select class="form-control" name="nip">
                                    	<option value=""> -Pilih Guru- </option>
                                        @foreach($guru as $dataguru)
                                        	<option value="{{ $dataguru->nip }}">{{ $dataguru->nip }} - {{ $dataguru->nama_guru }}</option>
                                        @endforeach
                                    </select>
								</div>
								<div class="form-group">
									<label>Kelas</label>
									<select class="form-control" name="kode_kelas">
                                    	<option value=""> -Pilih Kelas- </option>
                                        @foreach($kelas as $datakelas)
                                        	<option value="{{ $datakelas->kode_kelas }}">{{ $datakelas->nama_kelas }}</option>
                                        @endforeach
                                    </select>
								</div>
								<div class="form-group">
									<button class="btn btn-primary">Submit</button>
								</div>				
						</form>
					</div>
				</div>
@stop