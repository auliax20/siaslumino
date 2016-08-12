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
                                <th>Kelas</th>
						        <th>Guru</th>
                                <th>Mata Pelajaran</th>
                                <th>Status</th>
                                <th>Tanggal Absen</th>
                                <th>Operation</th>
						    </tr>
						    </thead>
                            <tbody>
                            <?php $no=1;?>
                            @foreach($absensi as $data)
                            <tr>
						        <td>{{$no++}}</td>
						        <td>{{$data->nis}}</td>
						        <td>{{$data->consolemurid->nama_murid}}</td>
                                <td>{{$data->consolekelas->nama_kelas}}</td>
                                <td>{{$data->consoleguru->nama_guru}}</td>
                                <td>{{$data->consolemapel->nama_mapel}}</td>
                                <td>{{$data->status}}</td>
                                <td>{{$data->tanggal_absen}}</td>
                                <td><a href="/pustaka/kembali/{{$data->id_pinjam}}" class="btn btn-success">Kembali</a></td>
						    </tr>
                            @endforeach
                            </tbody>
						</table>
					</div>
				</div>
			</div>
@stop