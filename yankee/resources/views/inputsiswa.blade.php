@extends('template.lumino')
@extends('template.menulumino')
@extends('template.contentlumino')
@section('title')
Input Siswa
@stop
@section('panel')
<div class="panel panel-default">
					<div class="panel-heading">Form Input Siswa</div>
					<div class="panel-body">
						<div class="col-lg-12">
							<form role="form">
							
								<div class="form-group">
									<label>Text Input</label>
									<input class="form-control" placeholder="Placeholder">
								</div>
																
								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control">
								</div>
								
								<div class="form-group checkbox">
								  <label>
								    <input type="checkbox">Remember me</label>
								</div>
																
								<div class="form-group">
									<label>File input</label>
									<input type="file">
									 <p class="help-block">Example block-level help text here.</p>
								</div>
								
						</form>
					</div>
				</div>

@stop