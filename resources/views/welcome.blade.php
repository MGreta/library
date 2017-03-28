<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Library</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- Styles -->
    </head>
    <body>
        <!-- <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">Library</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              
                    <form class="navbar-form navbar-left">
                        <ul class="nav navbar-nav">
                            <li><a href="#">Detali paieska</li>
                        </ul>
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                    @elseif (Auth::user())
                        <li><a href="{{ url('/profile') }}">Profile</a></li>
                        <li>
                            <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        Logout
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                </ul>
                </div>
            </div>
        </nav> -->
        @if (Auth::guest())
            @include('partials.header')
        @elseif (Auth::user()->hasRole("user"))
            @include('partials.header_user')
        @elseif (Auth::user()->hasRole("admin"))
            @include('partials.header_admin')
        @endif

        

        @if (Auth::guest())
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li><a href="{{ url('/books') }}">Books</a></li>
                        <li><a href="{{ url('/authors') }}">Authors</a></li>
                        <li><a href="{{ url('/language') }}">Language</a></li>
                        <li><a href="{{ url('/type') }}">Type</a></li>
                        <li><a href="{{ url('/genres') }}">Genre</a></li>
                    </ul>
                </div>
                <div class="col-md-10 main">
                    @yield('content')
                </div>
            </div>
        </div>
        @elseif (Auth::user()->hasRole("user"))
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li><a href="{{ url('/books') }}">All Books</a></li>
                    </ul>
                </div>
                <div class="col-md-10 main">
                    @yield('content')
                </div>
            </div>
        </div>
        @elseif (Auth::user()->hasRole("admin"))
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
                        <hr>
                        <li><a href=" {{ url('/options') }} ">Options</a></li>
                    </ul>
                </div>
                <div class="col-md-10 main">
                    @include ('partials.message')
                    @yield('content')
                </div>
            </div>
        </div>
        @endif



    @include ('partials.footer')

    </body>
</html>
