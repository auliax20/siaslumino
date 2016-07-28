@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
Input Guru
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
					<div class="panel-heading">Form Input Guru</div>
					<div class="panel-body">
						<div class="col-lg-12">
							<form role="form" method="POST" action="{{ asset('guru/inputguru') }}">
                            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label>NIP</label>
									<input class="form-control" placeholder="NIP" name="nip">
								</div>
								<div class="form-group">
									<label>Nama Lengkap</label>
									<input class="form-control" placeholder="Nama Lengkap" name="nama_guru">
								</div>
                                <div class="form-group">
									<label>Tanggal Lahir</label>
									<input class="form-control" placeholder="YYYY/MM/DD" name="tanggal_lahir" id="date">
								</div>
                                <div class="form-group">
									<label>Mata Pelajaran</label>
									<select class="form-control" name="mapel">
                                    <option value=""> -Pilih Mata Pelajaran-</option>
                                    @foreach($mapel as $data)
                                    	<option value="{{ $data->kode_mapel}}">{{ $data->nama_mapel }}</option>
                                    @endforeach
                                    </select>
								</div>	
                                <div class="form-group">
									<label>Jabatan</label>
									<select class="form-control" name="jabatan">
                                    	<option value="">-Pilih Jabatan-</option>
                                        <option value="kepsek">Kepala Sekolah</option>
                                        <option value="wakasek">Wakil Kepala Sekolah</option>
                                        <option value="guru">Guru</option>
                                        <option value="tatausaha">Tata Usaha</option>
                                    </select>
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