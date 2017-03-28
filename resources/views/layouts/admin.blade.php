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
					<li><a href="{{ url('/all-users') }}">Users</a></li>
					<li><a href="{{ url('/books') }}">Books</a></li>
					<li><a href="{{ url('/authors') }}">Authors</a></li>
					<li><a href="{{ url('/language') }}">Language</a></li>
					<li><a href="{{ url('/type') }}">Type</a></li>
					<li><a href="{{ url('/genres') }}">Genre</a></li>
					<li><a href="{{ url('/publishing-house') }}">Publishing House</a></li>
					<li><a href="{{ url('/city') }}">City</a></li>
					<hr>
					<li><a href="{{ url('/add-user') }}">Add users</a></li>
					<li><a href="{{ url('/add-book') }}">Add Books</a></li>
					<hr>					
					<li><a href="{{ url('/occupied-books') }}">Occupied Books</a></li>
					<li><a href="{{ url('/reservations') }}">Reserved Books</a></li>
					<li><a href="{{ url('/late-books') }}">Late Books</a></li>
					
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
