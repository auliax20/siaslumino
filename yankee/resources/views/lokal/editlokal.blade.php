@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
Edit Lokal
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
					<div class="panel-heading">Form Edit Lokal</div>
					<div class="panel-body">
						<div class="col-lg-12">
							<form role="form" method="POST" action="{{ asset('lokal/acedit/'.$siswa->id_lokal) }}">
                            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label>NIS</label>
									<input class="form-control" placeholder="NIS" name="nis" value="{{$siswa->nis}} - {{$siswa->consolemurid->nama_murid}}" id="nis">
								</div>
								<div class="form-group">
									<label>Kelas</label>
									<input class="form-control" placeholder="Kelas" name="kode_kelas" value="{{ $siswa->kode_kelas}} - {{$siswa->consolekelas->nama_kelas}}" id="kelas">
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
  $(function() { 
    $( "#kelas" ).autocomplete({
      source: '{{ asset('kelas/searchajax') }}',
	  minLength: 3
    });
  } );
</script>
@stop