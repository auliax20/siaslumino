@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
View Rekap Nilai Kelas
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
				<div class="panel-heading">View Rekap Nilai</div>
					<div class="panel-body">
					<table class="table" border="1">
						    <thead>
						    <tr>
						        <th rowspan="2" >NO</th>
						        <th rowspan="2" >NIS</th>
						        <th rowspan="2" >Nama Murid</th>
                                @foreach($mapel as $mp)
                                	<th colspan="7">{{ $mp->consolemapel->nama_mapel }}</th >
                                @endforeach
						    </tr>
                            <tr>
                            	<th colspan="3"></th>
                                @foreach($mapel as $mp)
                                	<th>UH - 1</th>
                                    <th>UH - 2</th>
                                    <th>MID</th>
                                    <th>UH - 3</th>
                                    <th>UH - 4</th>
                                    <th>TUGAS</th>
                                    <th>RAPORT</th>
                                @endforeach
                            </tr>
						    </thead>
                            <tbody>
                            
                            </tbody>
						</table>
					</div>
				</div>
			</div>
@stop