@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
Input Bahan Ajar
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
					<div class="panel-heading">Form Input Bahan Ajar</div>
					<div class="panel-body">
						<div class="col-lg-12">
							<form role="form" method="POST" action="{{ asset('bahanajar/editbahanajar/'.$bahan->id_bahan) }} " enctype="multipart/form-data">
                            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label>Nama Bahan Ajar</label>
                                                                        <input class="form-control" placeholder="Nama Bahan Ajar" name="nama_bahan" value="{{ $bahan->nama_bahan }}">
								</div>
								<div class="form-group">
									<label>NIP</label>
                                                                        <input class="form-control" placeholder="Ketikkan NIP / Nama Guru" name="nip" id="nip" value="{{ $bahan->nip }} - {{ $bahan->consoleguru->nama_guru }}">
								</div>
                                <div class="form-group">
									<label>Kelas</label>
									<input class="form-control" placeholder="Ketikkan Nama Kelas / Kode kelas" name="kode_kelas" id="kelas" value="{{ $bahan->kode_kelas }} - {{ $bahan->consolekelas->nama_kelas }}">
								</div>
                                <div class="form-group">
									<label>Mata pelarajan</label>
									<input class="form-control" placeholder="Ketikkan Mata Pelajaran / Kode Mata Pelajaran" name="kode_mapel" id="kode_mapel" value="{{ $bahan->kode_mapel }} - {{ $bahan->consolemapel->nama_mapel }}">
								</div>
                                <div class="form-group">
									<label>Type</label>
									<select class="form-control" name="type">
                                    	<option value=""> - Pilih Type Bahan Ajar - </option>
                                        @if($bahan->type=='text')
                                        <option value="text" selected="selected">Text</option>
                                        @else
                                        <option value="text">Text</option>
                                        @endif
                                        @if($bahan->type=='video')
                                            <option value="video" selected="selected">Video</option>
                                        @else
                                            <option value="video">Video</option>
                                        @endif
                                        
                                    </select>
								</div>
                                <div class="form-group">
									<label>File bahan</label>
									<input class="form-control" placeholder="" name="filebahan" type="file">
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