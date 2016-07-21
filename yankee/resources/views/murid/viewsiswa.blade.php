@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
View Siswa
@stop
@section('panel')
@if (session('error'))
    <div class="alert bg-danger">
        {{ session('error') }}
    </div>
@endif
			<div class="panel panel-default">
				<div class="panel-heading">View Siswa</div>
					<div class="panel-body">
					<table class="table batle-striped">
						    <thead>
						    <tr>
						        <th>NO</th>
						        <th>NIS</th>
						        <th>Nama Siswa</th>
						        <th>Alamat Siswa</th>
                                <th>Handphone</th>
                                <th>Username</th>
                                <th>Operation</th>
						    </tr>
						    </thead>
                            <tbody>
                            <?php $no=1;?>
                            @foreach($siswa as $data)
                            <tr>
						        <th>{{$no}}</th>
						        <th>{{$data->nis}}</th>
						        <th>{{$data->nama_murid}}</th>
						        <th>{{$data->alamat_murid}}</th>
                                <th>{{$data->no_hp}}</th>
                                <th>{{$data->username}}</th>
                                <th>Operation</th>
						    </tr>
                            <?php $no = $no++;?>
                            @endforeach
                            </tbody>
						</table>
					</div>
				</div>
			</div>
@stop