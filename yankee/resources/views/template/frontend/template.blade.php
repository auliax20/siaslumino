<!DOCTYPE html>
<html lang="id">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="Custom Bootstrap 3.3.2 skin">
  <meta name="keywords" content="bootstrap 3.3.2, skin, flat">
  <meta name="author" content="bootstraptaste">
  <title>Aplikasi Sistem Informasi Sekolah</title>
  <link href=" {{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('asset/css/bootstrap.custom.css')}}" rel="stylesheet">
  <!--[if lt IE 9]>
    <script src="{{ asset('asset/libs/html5shiv/src/html5shiv.js') }}"></script>
    <script src="{{ asset('asset/libs/respond/src/respond.js') }}"></script>
  <![endif]-->
</head>
<body class="container">
@yield('header')
<section class="container-fluid row">
	@yield('home')
	@yield('rsidebar')
	@yield('bbar')
</section>

@yield('footer')
</body>
</html>
