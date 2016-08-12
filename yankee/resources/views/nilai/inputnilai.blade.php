@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
Input Nilai
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
					<div class="panel-heading">Form Input Nilai</div>
					<div class="panel-body">
						<div class="col-lg-12">
							<form role="form" method="POST" action="{{ asset('nilai/inputnilai') }}">
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
									<input class="form-control" placeholder="Ketikkan Nama Kelas atau Kode Kelas" name="kode_kelas" id="kelas">
								</div>
                                <div class="form-group">
									<label>Mata Pelajaran</label>
									<input class="form-control" name="kode_mapel" id="kode_mapel">
								</div>
                                <div class="form-group">
									<label>Jenis Nilai</label>
									<select class="form-control" name="jenis_nilai" id="jam_pelajaran">
                                    	<option value="uh1">Ulangan Harian 1</option>
                                        <option value="uh2">Ulangan Harian 2</option>
                                        <option value="mid">Ujian Mid</option>
                                        <option value="uh3">Ulangan Harian 3</option>
                                        <option value="uh4">Ulangan Harian 4</option>
                                        <option value="tugas">Tugas</option>
                                        <option value="raport">Raport</option>
                                    </select>
								</div>
                                <div class="form-group">
									<label>Nilai</label>
									<input class="form-control" name="nilai" id="nilai">
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
    $( "#nip" ).autocomplete({
      source: '{{ asset('guru/searchajax') }}',
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
<script>
  $(function() { 
    $( "#kode_mapel" ).autocomplete({
      source: '{{ asset('mapel/searchajax') }}',
	  minLength: 3
    });
  } );
</script>
@stop