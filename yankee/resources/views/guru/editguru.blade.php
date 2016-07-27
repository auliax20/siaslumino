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
							<form role="form" method="POST" action="{{ asset('guru/editguru/'.$guru->username) }}">
                            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label>NIP</label>
									<input class="form-control" placeholder="NIP" name="nip" value="{{ $guru->nip}}">
								</div>
								<div class="form-group">
									<label>Nama Lengkap</label>
									<input class="form-control" placeholder="Nama Lengkap" name="nama_guru" value="{{ $guru->nama_guru}}">
								</div>
                                <div class="form-group">
									<label>Tanggal Lahir</label>
									<input class="form-control" placeholder="YYYY/mm/dd" name="tanggal_lahir" value="{{ $guru->tanggal_lahir}}">
								</div>	
                                <div class="form-group">
									<label>Jabatan</label>
									<select class="form-control" name="jabatan">
                                    
                                    	<option value="">-Pilih Jabatan-</option>
                                    @if($guru->jabatan=="kepsek")
                                        <option value="kepsek" selected="selected">Kepala Sekolah</option>
                                    @else
                                    	<option value="kepsek">Kepala Sekolah</option>
                                    @endif
                                    @if($guru->jabatan=="wakasek")
                                       <option value="wakasek" selected="selected">Wakil Kepala Sekolah</option>
                                    @else
                                    	<option value="wakasek">Wakil Kepala Sekolah</option>
                                    @endif
                                    @if($guru->jabatan=="guru")
                                       <option value="guru" selected="selected">Guru</option>
                                    @else
                                    	<option value="guru">Guru</option>
                                    @endif
                                    @if($guru->jabatan=="tatausaha")
                                       <option value="tatausaha" selected="selected">Tata Usaha</option>
                                    @else
                                    	<option value="tatausaha">Tata Usaha</option>
                                    @endif
                                    </select>
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