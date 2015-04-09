<!DOCTYPE html>
@section('htmlTag')
<html lang="en">
@show
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-site-verification" content="xcZpyBKJ_Fq68S-Z_n0mbw-6BCI2V9DjxeznSCc2FEE" />
	<title>musetech - Museum Technology Community</title>

	<link href="{{ asset('/css/main.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

@section('bodyTag')
<body>
@show
	@include('partials.nav')
	@yield('content')

	<!-- Scripts -->
	<script src="{{ asset('/js/vendor.js') }}"></script>
</html>
