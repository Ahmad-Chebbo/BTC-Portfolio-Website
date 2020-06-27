<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>{{ $user->name }}</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700%7CAllura" rel="stylesheet">
	<!-- Stylesheets -->

	<link rel="shortcut icon" href="{{ $media->favicon }}" type="image/x-icon">
	
	<link rel="stylesheet" href="{{ asset('frontend_files/common-css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend_files/common-css/ionicons.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend_files/common-css/fluidbox.min.css') }}">
	<link rel="stylesheet" href="{{ asset('frontend_files/01-cv-portfolio/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend_files/01-cv-portfolio/css/responsive.css') }}">
	<!-- Font-awesome 4 css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/font-awesome.min.css') }}">
	
</head>

	@include('includes._theme')
	
<body>
    @include('includes._header')
    
    @yield('content')
	
	
    @include('includes._footer')

	<!-- SCIPTS -->
	<script src="{{ asset('frontend_files/common-js/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('frontend_files/common-js/tether.min.js') }}"></script>
	<script src="{{ asset('frontend_files/common-js/bootstrap.js') }}"></script>
	<script src="{{ asset('frontend_files/common-js/isotope.pkgd.min.js') }}"></script>
	<script src="{{ asset('frontend_files/common-js/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('frontend_files/common-js/progressbar.min.js') }}"></script>
	<script src="{{ asset('frontend_files/common-js/jquery.fluidbox.min.js') }}"></script>
	<script src="{{ asset('frontend_files/common-js/typed.js') }}"></script>
	<script src="{{ asset('frontend_files/common-js/scripts.js') }}"></script>
	
    @include('includes._typed')
</body>
</html>