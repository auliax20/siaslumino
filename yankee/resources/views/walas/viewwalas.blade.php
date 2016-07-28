@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
View Wali Kelas
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
				<div class="panel-heading">View Wali Kelas</div>
					<div class="panel-body">
					<table class="table table-striped table-bordered">
						    <thead>
						    <tr>
						        <th>NO</th>
						        <th>Nama Wali Kelas</th>
						        <th>Nama Kelas</th>
                                <th>Operation</th>
						    </tr>
						    </thead>
                            <tbody>
                            <?php $no=1;?>
                            @foreach($walas as $data)
                            <tr>
						        <td>{{$no++}}</td>
						        <td>{{$data->consoleguru->nama_guru}}</td>
						        <td>{{$data->consolekelas->nama_kelas}}</td>
                                <td><a href="/walas/edit/{{$data->id_walas}}" class="btn btn-warning">Edit</a> <a href="/walas/delete/{{$data->id_walas}}" class="btn btn-danger">Delete</a></td>
						    </tr>
                            @endforeach
                            </tbody>
						</table>
					</div>
				</div>
			</div>
@stop