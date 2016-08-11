@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
Absensi By Nis By Tanggal
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
					<div class="panel-heading">Form Filter Absen By NIS By Tanggal</div>
					<div class="panel-body">
						<div class="col-lg-12">
							<form role="form" method="POST" action="{{ asset('absensi/filterbynistgl') }}">
                            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label>NIS</label>
									<input class="form-control" placeholder="Ketikkan Nis atau Nama Muri" name="nis" id="nis">
								</div>
                                <div class="form-group">
									<label>Dari Tanggal</label>
									<input class="form-control" name="tanggal1" id="tgl">
								</div>
                                <div class="form-group">
									<label>Sampai Tanggal</label>
									<input class="form-control" name="tanggal2" id="tgl">
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
  $(function() { 
    $( "#nis" ).autocomplete({
      source: '{{ asset('siswa/searchajax') }}',
	  minLength: 3
    });
  } );
</script>
<script>
    				$(document).ready(function(){
      				var date_input=$('input[id="tgl"]'); //our date input has the name "date"
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