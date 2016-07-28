@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
View Ortu
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
				<div class="panel-heading">View Ortu</div>
					<div class="panel-body">
					<table class="table batle-striped">
						    <thead>
						    <tr>
						        <th>NO</th>
						        <th>Nama Ortu</th>
						        <th>Nama Murid</th>
						        <th>Alamat Ortu</th>
                                <th>Telepon</th>
                                <th>Handphone</th>
                                <th>Username</th>
                                <th>Operation</th>
						    </tr>
						    </thead>
                            <tbody>
                            <?php $no=1;?>
                            @foreach($ortu as $data)
                            <tr>
						        <td>{{$no++}}</td>
						        <td>{{$data->nama_ortu}}</td>
						        <td>{{$data->nis}} - {{$data->console->nama_murid}}</td>
						        <td>{{$data->alamat_ortu}}</td>
                                <td>{{$data->telp_ortu}}</td>
                                <td>{{$data->hp_ortu}}</td>
                                <td>{{$data->username}}</td>
                                <td><a href="/ortu/edit/{{$data->id_ortu}}" class="btn btn-warning">Edit</a> <a href="/ortu/delete/{{$data->id_ortu}}" class="btn btn-danger">Delete</a></td>
						    </tr>
                            @endforeach
                            </tbody>
						</table>
					</div>
				</div>
			</div>
@stop