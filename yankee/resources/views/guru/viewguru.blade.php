@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
View Guru
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
				<div class="panel-heading">View Guru</div>
					<div class="panel-body">
					<table class="table batle-striped">
						    <thead>
						    <tr>
						        <th>NO</th>
						        <th>NIP</th>
						        <th>Nama Guru</th>
						        <th>Tanggal Lahir</th>
                                <th>Mata Pelajaran</th>
                                <th>Jabatan</th>
                                <th>Username</th>
                                <th>Operation</th>
						    </tr>
						    </thead>
                            <tbody>
                            <?php $no=1;?>
                            @foreach($guru as $data)
                            <tr>
						        <td>{{$no++}}</td>
						        <td>{{$data->nip}}</td>
						        <td>{{$data->nama_guru}}</td>
						        <td>{{$data->tanggal_lahir}}</td>
                                <td>{{$data->console->nama_mapel}}</td>
                                <td>{{$data->jabatan}}</td>
                                <td>{{$data->username}}</td>
                                <td><a href="/guru/edit/{{$data->username}}" class="btn btn-warning">Edit</a> <a href="/guru/delete/{{$data->username}}" class="btn btn-danger">Delete</a></td>
						    </tr>
                            @endforeach
                            </tbody>
						</table>
					</div>
				</div>
			</div>
@stop