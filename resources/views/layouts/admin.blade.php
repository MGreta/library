<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="_token" content="{{ csrf_token() }}">
	<meta name="_url" content="{{ url('/') }}">

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<title>Library</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- Styles -->
</head>
<body>
	@include ('partials.header_admin')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2 sidebar">
				<ul class="nav nav-sidebar">
					<li><a href="{{ url('/all-users') }}">Vartotojai</a></li>
					<li><a href="{{ url('/books') }}">Knygos</a></li>
					<li><a href="{{ url('/authors') }}">Autoriai</a></li>
					<li><a href="{{ url('/language') }}">Kalbos</a></li>
					<li><a href="{{ url('/type') }}">Tipai</a></li>
					<li><a href="{{ url('/genres') }}">Žanrai</a></li>
					<li><a href="{{ url('/publishing-house') }}">Leidyklos</a></li>
					<li><a href="{{ url('/city') }}">Miestai</a></li>
					<hr>
					<li><a href="{{ url('/add-user') }}">Pridėti vartotoją</a></li>
					<li><a href="{{ url('/add-book') }}">Pridėti knygą</a></li>
					<hr>					
					<li><a href="{{ url('/occupied-books') }}">Paimtos knygos</a></li>
					<li><a href="{{ url('/reservations') }}">Rezervuotos knygos</a></li>
					<li><a href="{{ url('/late-books') }}">Vėluojamos grąžinti knygos</a></li>
					
				</ul>
			</div>
			<div class="col-md-10 main">
				@include ('partials.message')
				@yield('content')
			</div>
		</div>
	</div>
	@include ('partials.footer')
		<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
