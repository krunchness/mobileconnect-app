<!DOCTYPE html>
<html>
<head>
	<title>SC Mobile Connect</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Vendor Files -->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/font-awesome-5/css/all.min.css') }}">

	<script type="text/javascript" src="{{ asset('vendor/jquery-3.2.1.min.js') }}"></script>

	@yield('head-custom')

	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css?ver=1.0.1') }}">
</head>
<body>

	<div class="layout-container">
		<div class="container">
			@yield('content')
		</div>
	</div>
	

	@yield('footer-custom')
	<script type="text/javascript" src="{{ asset('js/dashboard/script.js?ver=1.0.1') }}"></script>
</body>
</html>