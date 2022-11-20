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
	<title>Administrator</title>

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

	<!-- Common CSS -->
	<link rel="stylesheet" href="{{ asset('unify/css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('unify/fonts/icomoon/icomoon.css') }}" />
	<link rel="stylesheet" href="{{ asset('unify/css/main.css') }}" />

	<!-- Other CSS includes plugins - Cleanedup unnecessary CSS -->
	<!-- Chartist css -->
	<link href="{{ asset('unify/vendor/chartist/css/chartist.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('unify/vendor/chartist/css/chartist-custom.css') }}" rel="stylesheet" />

	<!-- Data Tables -->
	<link rel="stylesheet" href="{{ asset('unify/vendor/datatables/dataTables.bs4.css') }}" />
	<link rel="stylesheet" href="{{ asset('unify/vendor/datatables/dataTables.bs4-custom.css') }}" />
	<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>

</head>

<body>

	@yield('content')
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
	
	<!-- jQuery first, then Tether, then other JS. -->
	<script src="{{ asset('unify/js/jquery.js') }}"></script>
	<script src="{{ asset('unify/js/tether.min.js') }}"></script>
	<script src="{{ asset('unify/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('unify/vendor/unifyMenu/unifyMenu.js') }}"></script>
	<script src="{{ asset('unify/vendor/onoffcanvas/onoffcanvas.js') }}"></script>
	<script src="{{ asset('unify/js/moment.js') }}"></script>

	<!-- Slimscroll JS -->
	<script src="{{ asset('unify/vendor/slimscroll/slimscroll.min.js') }}"></script>
	<script src="{{ asset('unify/vendor/slimscroll/custom-scrollbar.js') }}"></script>

	<!-- Chartist JS -->
	<script src="{{ asset('unify/vendor/chartist/js/chartist.min.js') }}"></script>
	<script src="{{ asset('unify/vendor/chartist/js/chartist-tooltip.js') }}"></script>
	<script src="{{ asset('unify/vendor/chartist/js/custom/custom-line-chart.js') }}"></script>
	<script src="{{ asset('unify/vendor/chartist/js/custom/custom-line-chart1.js') }}"></script>
	<script src="{{ asset('unify/vendor/chartist/js/custom/custom-area-chart.js') }}"></script>
	<script src="{{ asset('unify/vendor/chartist/js/custom/donut-chart2.js') }}"></script>
	<script src="{{ asset('unify/vendor/chartist/js/custom/custom-line-chart4.js') }}"></script>

	<!-- Common JS -->
	<script src="{{ asset('unify/js/common.js') }}"></script>

	<!-- Data Tables -->
	<script src="{{ asset('unify/vendor/datatables/dataTables.min.js') }}"></script>
	<script src="{{ asset('unify/vendor/datatables/dataTables.bootstrap.min.js') }}"></script>

	<!-- Custom Data tables -->
	<script src="{{ asset('unify/vendor/datatables/custom/custom-datatables.js') }}"></script>
	<script src="{{ asset('unify/vendor/datatables/custom/fixedHeader.js') }}"></script>

</body>

</html>