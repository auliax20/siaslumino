@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
View Pinjaman
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
				<div class="panel-heading">View Pinjaman</div>
					<div class="panel-body">
					<table class="table batle-striped">
						    <thead>
						    <tr>
						        <th>NO</th>
						        <th>NIS</th>
						        <th>Nama Murid</th>
						        <th>Kode Buku</th>
                                <th>Nama Buku</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Batas</th>
                                <th>Operation</th>
						    </tr>
						    </thead>
                            <tbody>
                            <?php $no=1;?>
                            @foreach($pustaka as $data)
                            <tr>
						        <td>{{$no++}}</td>
						        <td>{{$data->nis}}</td>
						        <td>{{$data->consolemurid->nama_murid}}</td>
						        <td>{{$data->kode_buku}}</td>
                                <td>{{$data->consolebuku->nama_buku}}</td>
                                <td>{{$data->consolebuku->pengarang}}</td>
                                <td>{{$data->consolebuku->penerbit}}</td>
                                <td>{{$data->tanggal_pinjam}}</td>
                                <td>{{$data->tanggal_batas}}</td>
                                <td><a href="/pustaka/kembali/{{$data->id_pinjam}}" class="btn btn-success">Kembali</a></td>
						    </tr>
                            @endforeach
                            </tbody>
						</table>
					</div>
				</div>
			</div>
@stop