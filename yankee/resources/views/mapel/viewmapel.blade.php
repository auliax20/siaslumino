@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
View Mata Pelajaran
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
				<div class="panel-heading">View Mata Pelajaran</div>
					<div class="panel-body">
					<table class="table table-striped table-bordered">
						    <thead>
						    <tr>
						        <th>NO</th>
						        <th>Kode Mata Pelajaran</th>
						        <th>Nama Mata Pelajaran</th>
                                <th>Operation</th>
						    </tr>
						    </thead>
                            <tbody>
                            <?php $no=1;?>
                            @foreach($mapel as $data)
                            <tr>
						        <td>{{$no++}}</td>
						        <td>{{$data->kode_mapel}}</td>
						        <td>{{$data->nama_mapel}}</td>
                                <td><a href="/mapel/edit/{{$data->id_mapel}}" class="btn btn-warning">Edit</a> <a href="/mapel/delete/{{$data->id_mapel}}" class="btn btn-danger">Delete</a></td>
						    </tr>
                            @endforeach
                            </tbody>
						</table>
					</div>
				</div>
			</div>
@stop