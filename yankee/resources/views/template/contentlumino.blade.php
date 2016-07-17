@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">@yield('title')</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				@yield('panel')
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				@yield('middle')
			</div>
		</div><!--/.row-->
					
		<div class="row">
			<div class="col-md-8">
				@yield('bottom-left')
			</div><!--/.col-->
			
			<div class="col-md-4">
				@yield('bottom-right')								
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop