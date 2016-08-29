@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
Edit Kategori
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
					<div class="panel-heading">Form Edit Kategori</div>
					<div class="panel-body">
						<div class="col-lg-12">
							<form role="form" method="POST" action="{{ asset('/blog-manager/category/editac/'.$category->id_category) }}">
                            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label>Kategori</label>
                                                                        <input class="form-control" placeholder="Kategori" name="category" value="{{ $category->category }}">
								</div>
								<div class="form-group">
									<label>Status</label>
									<select class="form-control" name="status">
                                                                            @if($category->status == "active")
                                                                            <option value=""> - Pilih Status - </option>
                                                                            <option value="active" selected="selected">Aktif</option>
                                                                            <option value="non-active">Tidak Aktif</option>
                                                                            @elseif($category->status == "non-active")
                                                                            <option value=""> - Pilih Status - </option>
                                                                            <option value="active">Aktif</option>
                                                                            <option value="non-active" selected="selected">Tidak Aktif</option>
                                                                            @else
                                                                            <option value=""> - Pilih Status - </option>
                                                                            <option value="active">Aktif</option>
                                                                            <option value="non-active">Tidak Aktif</option>
                                                                            @endif
                                                                        </select>
								</div>
								<div class="form-group">
									<button class="btn btn-primary">Submit</button>
								</div>				
						</form>
					</div>
				</div>
@stop