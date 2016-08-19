@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
View Lokal
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
				<div class="panel-heading">View Lokal</div>
					<div class="panel-body">
					<table class="table table-striped table-bordered">
						    <thead>
						    <tr>
						        <th>NO</th>
						        <th>NIS</th>
						        <th>Nama Siswa</th>
						        <th>Kode Kelas</th>
                                <th>Kelas</th>
                                <th>Operation</th>
						    </tr>
						    </thead>
                            <tbody>
                            <?php $no=1;?>
                            @foreach($siswa as $data)
                            <tr>
						        <td>{{$no++}}</td>
						        <td>{{$data->nis}}</td>
						        <td>{{$data->consolemurid->nama_murid}}</td>
						        <td>{{$data->kode_kelas}}</td>
                                <td>{{$data->consolekelas->nama_kelas}}</td>
                                <td><a href="/lokal/edit/{{$data->id_lokal}}" class="btn btn-warning">Edit</a> <a href="/lokal/delete/{{$data->id_lokal}}" class="btn btn-danger">Delete</a></td>
						    </tr>
                            @endforeach
                            </tbody>
						</table>
					</div>
				</div>
			</div>
@stop