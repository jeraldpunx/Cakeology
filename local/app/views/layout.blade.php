<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('assets/css/mystyle.css') }}">

</head>


<body>
	@include('nav')
	

	<div class="container">
		<div class="starter">
			@yield('content')
		</div>
	</div>

	

	<script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
	@yield('script')
</body>
</html>