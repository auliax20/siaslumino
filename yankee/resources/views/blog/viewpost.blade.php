@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
View Bahan Ajar
@stop
@section('panel')
@if (session('error'))
    <div class="alert bg-danger">
        {{ session('error') }}
    </div>
@endif
@if (session('message'))
    <div class="alert bg-success">
        {{ session('message') }}
    </div>
@endif
			<div class="panel panel-default">
				<div class="panel-heading">View Bahan Ajar</div>
					<div class="panel-body">
					<table class="table table-striped table-bordered">
						    <thead>
						    <tr>
						        <th>NO</th>
						        <th>Nama Bahan Ajar</th>
						        <th>Guru</th>
                                <th>Mata Pelajaran</th>
                                <th>Kelas</th>
						        <th>Type</th>
                                                        <th>File</th>
                                <th>Operation</th>
						    </tr>
						    </thead>
                            <tbody>
                            <?php $no=1;?>
                            @foreach($bahan as $data)
                            <tr>
						        <td>{{$no++}}</td>
						        <td>{{$data->nama_bahan}}</td>
						        <td>{{$data->nip}} - {{$data->consoleguru->nama_guru}}</td>
                                <td>{{$data->consolemapel->nama_mapel}}</td>
                                <td>{{$data->consolekelas->nama_kelas}}</td>
						        <td>{{$data->type}}</td>
                                                        <td>{{$data->file}}</td>
                                <td><a href="/bahanajar/edit/{{$data->id_bahan}}" class="btn btn-warning">Edit</a> <a href="/buku/delete/{{$data->id_bahan}}" class="btn btn-danger">Delete</a></td>
						    </tr>
                            @endforeach
                            </tbody>
						</table>
					</div>
				</div>
			</div>
@stop