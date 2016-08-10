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
					<div class="panel-heading">Form Input Absensi</div>
					<div class="panel-body">
						<div class="col-lg-12">
							<form role="form" method="POST" action="{{ asset('pustaka/inputpinjaman') }}">
                            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label>NIS</label>
									<input class="form-control" placeholder="Ketikkan NIS atau Nama" name="nis" id="nis">
								</div>
                                <div class="form-group">
									<label>NIP</label>
									<input class="form-control" placeholder="Ketikkan NIP atau Nama" name="nip" id="nip">
								</div>
								<div class="form-group">
									<label>Kelas</label>
									<input class="form-control" placeholder="Ketikkan Nama Kelas atau Kode Kelas" name="kelas" id="kelas">
								</div>
                                <div class="form-group">
									<label>Jam Pelajaran</label>
									<select class="form-control" name="jam_pelajaran" id="jam_pelajaran">
                                    	<option value="1">Jam 1</option>
                                        <option value="2">Jam 2</option>
                                        <option value="3">Jam 3</option>
                                        <option value="4">Jam 4</option>
                                        <option value="5">Jam 5</option>
                                        <option value="6">Jam 6</option>
                                        <option value="7">Jam 7</option>
                                        <option value="8">Jam 8</option>
                                    </select>
								</div>
                                <div class="form-group">
									<label>Mata Pelajaran</label>
									<input class="form-control" name="kode_mapel" id="kode_mapel">
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
      source: '{{ asset('buku/searchajax') }}',
	  minLength: 3
    });
  } );
</script>
<script>
  $(function() { 
    $( "#kode_mapel" ).autocomplete({
      source: '{{ asset('mapel/searchajax') }}',
	  minLength: 3
    });
  } );
</script>
@stop