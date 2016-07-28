@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
Edit Orang Tua
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
					<div class="panel-heading">Form Edit Orang Tua</div>
					<div class="panel-body">
						<div class="col-lg-12">
							<form role="form" method="POST" action="{{ asset('ortu/editortu/'.$ortu->id_ortu) }}">
                            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label>Nama Orangtua</label>
									<input class="form-control" placeholder="Nama Orangtua" name="nama_ortu" value="{{ $ortu->nama_ortu }}">
								</div>
								<div class="form-group">
									<label>NIS - Siswa</label>
									<select class="form-control" name="nis">
                                    <option value=""> -Pilih Siswa- </option>
                                    @foreach($siswa as $data)
                                    	@if($ortu->nis == $data->nis)
                                    		<option value="{{ $data->nis }}" selected="selected">{{ $data->nis }} - {{ $data->nama_murid }}</option>
                                         @else
                                         	<option value="{{ $data->nis }}">{{ $data->nis }} - {{ $data->nama_murid }}</option>
                                         @endif
                                    @endforeach
                                    </select>
								</div>
                                <div class="form-group">
									<label>Alamat</label>
									<input class="form-control" placeholder="Alamat" name="alamat_ortu" value="{{ $ortu->alamat_ortu }}">
								</div>
                                <div class="form-group">
									<label>Telepon</label>
									<input class="form-control" placeholder="Telepon" name="telp_ortu" value="{{ $ortu->telp_ortu }}">
								</div>	
                                <div class="form-group">
									<label>Handphone</label>
									<input class="form-control" placeholder="Handphone" name="hp_ortu" value="{{ $ortu->hp_ortu }}">
								</div>
								<div class="form-group">
									<button class="btn btn-primary">Submit</button>
								</div>				
						</form>
					</div>
				</div>
@stop
@section('jsadd')
<script>
    				$(document).ready(function(){
      				var date_input=$('input[name="tanggal_lahir"]'); //our date input has the name "date"
      				var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      				var options={
        				format: 'yyyy/mm/dd',
        				container: container,
        				todayHighlight: true,
        				autoclose: true,
      				};
      				date_input.datepicker(options);
    				})
</script>
@stop