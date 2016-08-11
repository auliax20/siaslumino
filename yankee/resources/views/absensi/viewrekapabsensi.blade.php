@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
View Absensi
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
				<div class="panel-heading">View Absensi</div>
					<div class="panel-body">
					<table class="table batle-striped">
						    <thead>
						    <tr>
						        <th>NO</th>
						        <th>NIS</th>
						        <th>Nama Murid</th>
                                <th>Hadir</th>
						        <th>Sakit</th>
                                <th>Izin</th>
                                <th>Alfa</th>
                                <th>Cabut</th>
						    </tr>
						    </thead>
                            <tbody>
                            <?php $no=1;?>
                            @foreach($data as $data)
                            <tr>
						        <td>{{$no++}}</td>
						        <td>{{$data->nis}}</td>
						        <td>{{$data->nama}}</td>
                                <td>{{$data->hadir}}</td>
                                <td>{{$data->sakit}}</td>
                                <td>{{$data->izin}}</td>
                                <td>{{$data->alfa}}</td>
                                <td>{{$data->cabut}}</td>
						    </tr>
                            @endforeach
                            </tbody>
						</table>
					</div>
				</div>
			</div>
@stop