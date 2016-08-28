@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
Input Kategori
@stop
@section('panel')
@if (session('error'))
    <div class="alert bg-danger">
        {{ session('error') }}
    </div>
@endif
@if (session('message'))
    <div class="alert bg-primary">
        {{ session('message') }}
    </div>
@endif
<div class="panel panel-default">
					<div class="panel-heading">Form Input Kategori</div>
					<div class="panel-body">
						<div class="col-lg-12">
							<form role="form" method="POST" action="{{ asset('/blog-manager/category/inputcategory') }}">
                            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label>Kategori</label>
									<input class="form-control" placeholder="Kategori" name="category">
								</div>
								<div class="form-group">
									<label>Status</label>
									<select class="form-control" name="status">
                                                                            <option value=""> - Pilih Status - </option>
                                                                            <option value="active">Aktif</option>
                                                                            <option value="non-active">Tidak Aktif</option>
                                                                        </select>
								</div>
								<div class="form-group">
									<button class="btn btn-primary">Submit</button>
								</div>				
						</form>
					</div>
				</div>
@stop