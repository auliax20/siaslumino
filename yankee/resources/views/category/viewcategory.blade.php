@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
View Kategori
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
				<div class="panel-heading">View Kategori</div>
					<div class="panel-body">
					<table class="table table-striped table-bordered">
						    <thead>
						    <tr>
						        <th>NO</th>
						        <th>Kategori</th>
						        <th>Status</th>
                                                        <th>Operation</th>
						    </tr>
						    </thead>
                            <tbody>
                            <?php $no=1;?>
                            @foreach($category as $data)
                            <tr>
						        <td>{{$no++}}</td>
						        <td>{{$data->category}}</td>
						        <td>{{$data->status}}</td>
                                <td><a href="/blog-manager/category/edit/{{$data->id_category}}" class="btn btn-warning">Edit</a> <a href="/blog-manager/category/delete/{{$data->id_category}}" class="btn btn-danger">Delete</a></td>
						    </tr>
                            @endforeach
                            </tbody>
						</table>
					</div>
				</div>
			</div>
@stop