@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
View Post
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
				<div class="panel-heading">View Post</div>
					<div class="panel-body">
					<table class="table table-striped table-bordered">
						    <thead>
						    <tr>
						        <th>NO</th>
						        <th>Judul</th>
						        <th>Isi Post</th>
                                <th>Kategori</th>
                                <th>User</th>
						        <th>Status</th>
                                <th>Operation</th>
						    </tr>
						    </thead>
                            <tbody>
                            <?php $no=1;?>
                            @foreach($post as $data)
                            <tr>
						        <td>{{$no++}}</td>
						        <td>{{$data->nama_bahan}}</td>
						        <td>{{$data->post}}</td>
                                <td>{{$data->consolecategory->category}}</td>
                                <td>{{$data->user}}</td>
						        <td>{{$data->status}}</td>
                                <td><a href="/blog-manager/post/edit/{{$data->id_post}}" class="btn btn-warning">Edit</a> <a href="/blog-manager/post/delete/{{$data->id_post}}" class="btn btn-danger">Delete</a></td>
						    </tr>
                            @endforeach
                            </tbody>
						</table>
					</div>
				</div>
			</div>
@stop