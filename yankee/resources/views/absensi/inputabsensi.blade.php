@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
Input Pinjaman
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
					<div class="panel-heading">Form Input Pinjaman</div>
					<div class="panel-body">
						<div class="col-lg-12">
							<form role="form" method="POST" action="{{ asset('pustaka/inputpinjaman') }}">
                            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label>NIS</label>
									<input class="form-control" placeholder="Ketikkan NIS atau Nama" name="nis" id="nis">
								</div>
                                <div class="form-group">
									<label>Buku</label>
									<input class="form-control" placeholder="Ketikkan Kode Buku atau Nama Buku" name="kode_buku" id="buku">
								</div>
								<div class="form-group">
									<label>Lama Pinjam</label>
									<input class="form-control" placeholder="Lama Pinjaman Dalam Hari" name="top" id="top">
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
    $( "#buku" ).autocomplete({
      source: '{{ asset('buku/searchajax') }}',
	  minLength: 3
    });
  } );
</script>
@stop