<!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<script src="{{ asset('js/app.js') }}"></script>

</head>
<body>

	<nav class="navbar navbar_default">
		<div class="container-fluid">
		    @yield('navbar-brand')
		</div>
	</nav>
	<div class="container">
        @yield('content')
    </div>
    
	@yield('script')
</body>
</html>