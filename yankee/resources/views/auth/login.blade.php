@extends('template.template')
@section('content')
<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Log In your Account</h4>
			</div> <!-- /.modal-header -->

			<div class="modal-body">
				<form role="form" method="post" action="{{ asset('/login')}}">
                	<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<div class="input-group">
							<input type="text" class="form-control" id="uLogin" placeholder="Login Username" name="username">
							<label for="uLogin" class="input-group-addon glyphicon glyphicon-user"></label>
						</div>
					</div> <!-- /.form-group -->

					<div class="form-group">
						<div class="input-group">
							<input type="password" class="form-control" id="uPassword" placeholder="Password" name="password">
							<label for="uPassword" class="input-group-addon glyphicon glyphicon-lock"></label>
						</div> <!-- /.input-group -->
					</div> <!-- /.form-group -->
				

			</div> <!-- /.modal-body -->

			<div class="modal-footer">
				<button class="form-control btn btn-primary" type="submit">Login</button>
			</div> <!-- /.modal-footer -->
			</form>
		</div><!-- /.modal-content -->
	</div>
@stop