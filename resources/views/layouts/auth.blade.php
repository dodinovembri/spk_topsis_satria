<!doctype html>
<html lang="en">
	
<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="Administrator" />
		<meta name="keywords" content="Administrator" />
		<meta name="author" content="" />
		<link rel="shortcut icon" href="img/favicon.ico" />
		<title>Administrator - Login</title>
		
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
		
		<!-- Common CSS -->
		<link rel="stylesheet" href="{{ asset('unify/css/bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('unify/fonts/icomoon/icomoon.css') }}" />

		<!-- Mian and Login css -->
		<link rel="stylesheet" href="{{ asset('unify/css/main.css') }}" />

	</head>  

	<body class="login-bg">

        @yield('content')
    
		<footer class="main-footer no-bdr fixed-btm">
			<div class="container">
				Copyright Unify Admin 2017.
			</div>
		</footer>
	</body>

</html>