@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
View Buku
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
				<div class="panel-heading">View Buku</div>
					<div class="panel-body">
					<table class="table table-striped table-bordered">
						    <thead>
						    <tr>
						        <th>NO</th>
						        <th>Kode Buku</th>
						        <th>Nama Buku</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
						        <th>Jumlah</th>
                                <th>Operation</th>
						    </tr>
						    </thead>
                            <tbody>
                            <?php $no=1;?>
                            @foreach($buku as $data)
                            <tr>
						        <td>{{$no++}}</td>
						        <td>{{$data->kode_buku}}</td>
						        <td>{{$data->nama_buku}}</td>
                                <td>{{$data->pengarang}}</td>
                                <td>{{$data->penerbit}}</td>
						        <td>{{$data->jumlah}}</td>
                                <td><a href="/buku/edit/{{$data->id_buku}}" class="btn btn-warning">Edit</a> <a href="/buku/delete/{{$data->id_buku}}" class="btn btn-danger">Delete</a></td>
						    </tr>
                            @endforeach
                            </tbody>
						</table>
					</div>
				</div>
			</div>
@stop