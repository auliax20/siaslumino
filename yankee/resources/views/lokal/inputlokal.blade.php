@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
Input Lokal
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
					<div class="panel-heading">Form Input Lokal</div>
					<div class="panel-body">
						<div class="col-lg-12">
							<form role="form" method="POST" action="{{ asset('lokal/inputlokal') }}">
                            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label>NIS</label>
									<input class="form-control" placeholder="Ketikkan NIS / Nama Siswa" name="nis" id="nis">
								</div>
								<div class="form-group">
									<label>Kelas</label>
									<input class="form-control" placeholder="Ketikkan kode kelas / nama kelas" name="kode_kelas" id="kelas">
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