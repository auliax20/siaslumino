@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
View Kelas
@stop
@section('panel')
@if (session('errors'))
    <div class="alert bg-danger">
        {{ session('errors') }}
    </div>
@endif
@if (session('message'))
    <div class="alert bg-success">
        {{ session('message') }}
    </div>
@endif

			<div class="panel panel-default">
				<div class="panel-heading">View Kelas</div>
					<div class="panel-body">
					<table class="table table-striped table-bordered">
						    <thead>
						    <tr>
						        <th>NO</th>
						        <th>Kode Kelas</th>
						        <th>Nama Kelas</th>
						        <th>Kapasitas</th>
                                <th>Operation</th>
						    </tr>
						    </thead>
                            <tbody>
                            <?php $no=1;?>
                            @foreach($kelas as $data)
                            <tr>
						        <td>{{$no++}}</td>
						        <td>{{$data->kode_kelas}}</td>
						        <td>{{$data->nama_kelas}}</td>
						        <td>{{$data->kapasitas}}</td>
                                <td><a href="/kelas/edit/{{$data->id_kelas}}" class="btn btn-warning">Edit</a> <a href="/kelas/delete/{{$data->id_kelas}}" class="btn btn-danger">Delete</a></td>
						    </tr>
                            @endforeach
                            </tbody>
						</table>
					</div>
				</div>
			</div>
@stop