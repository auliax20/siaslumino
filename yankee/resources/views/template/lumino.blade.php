<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title')</title>
@yield('cssextend')
<link href="{{ asset('asset/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ asset('asset/css/datepicker3.css')}}" rel="stylesheet">
<link href="{{ asset('asset/css/styles.css')}}" rel="stylesheet">
<link href="{{ asset('asset/css/bootstrap-table.css')}}" rel="stylesheet">
<link href="{{ asset('asset/css/jquery-ui.css')}}" rel="stylesheet">

<!--Icons-->
<script src="{{ asset('asset/js/lumino.glyphs.js')}}"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Sistem Informasi Akademik Sekolah (<span>SIAS</span>)</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> {{ Auth::user()->namalengkap }} <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ asset('/logout') }}"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			@yield('menu')
		</ul>

	</div><!--/.sidebar-->
	@yield('content')	
	

	<script src="{{ asset('asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    <script>
						    $(function () {
						        $('#hover, #striped, #condensed').click(function () {
						            var classes = 'table';
						
						            if ($('#hover').prop('checked')) {
						                classes += ' table-hover';
						            }
						            if ($('#condensed').prop('checked')) {
						                classes += ' table-condensed';
						            }
						            $('#table-style').bootstrapTable('destroy')
						                .bootstrapTable({
						                    classes: classes,
						                    striped: $('#striped').prop('checked')
						                });
						        });
						    });
						
						    function rowStyle(row, index) {
						        var classes = ['active', 'success', 'info', 'warning', 'danger'];
						
						        if (index % 2 === 0 && index / 2 < classes.length) {
						            return {
						                classes: classes[index / 2]
						            };
						        }
						        return {};
						    }
						</script>
	<!--
    <script src="{{ asset('asset/js/chart.min.js')}}"></script>
	<script src="{{ asset('asset/js/chart-data.js')}}"></script>
	<script src="{{ asset('asset/js/easypiechart.js')}}"></script>
	<script src="{{ asset('asset/js/easypiechart-data.js')}}"></script>
    -->
	<script src="{{ asset('asset/js/bootstrap-datepicker.js')}}"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
    @yield('jsadd')
</body>

</html>
