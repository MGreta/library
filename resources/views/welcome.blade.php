<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Library</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

        <script src="http://code.highcharts.com/highcharts.js"></script>


        <!-- Styles -->
        <style type="text/css">
            body {
                /*background-image: url(<?php URL::to('/')?>/background.jpg);*/
                /*background-color: #dcc7aa;*/
                background-color: #d7cec7;
                /*background-color: #d5d5d5;*/
            }
        </style>
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
                        <li><a href="{{ url('/books') }}">Knygos</a></li>
                        <li><a href="{{ url('/authors') }}">Autoriai</a></li>
                        <li><a href="{{ url('/language') }}">Kalbos</a></li>
                        <li><a href="{{ url('/type') }}">Tipai</a></li>
                        <li><a href="{{ url('/genres') }}">Žanrai</a></li>
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
                    @if( count_user_occupied_books() > 0 )
                        <li><a href=" {{ url('/user-books') }} ">Šiuo metu turimos knygos  ({{ count_user_occupied_books() }})</a></li>
                    @endif
                    @if( count_user_late_books() > 0 )
                        <li><a href=" {{ url('/user-late-books') }} ">Vėluojamos grąžinti knygos ({{ count_user_late_books() }})</a></li>
                    @endif
                    @if( count_user_returned_books() > 0 )
                        <li><a href=" {{ url('/user-returned-books') }} ">Grąžintos knygos ({{ count_user_returned_books() }})</a></li>
                    @endif
                    @if( count_user_reserved_books() > 0 )
                        <li><a href=" {{ url('/user-reserved-books') }} ">Rezervuotos knygos ({{ count_user_reserved_books() }})</a></li>
                    @endif
                        <hr>
                        <li><a href="{{ url('/books') }}">Knygos</a></li>
                        <li><a href="{{ url('/authors') }}">Autoriai</a></li>
                        <li><a href="{{ url('/language') }}">Kalbos</a></li>
                        <li><a href="{{ url('/type') }}">Tipai</a></li>
                        <li><a href="{{ url('/genres') }}">Žanrai</a></li>
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
                        <li><a href="{{ url('/all-users') }}">Vartotojai</a></li>
                        <li><a href="{{ url('/books') }}">Knygos</a></li>
                        <li><a href="{{ url('authors') }}">Autoriai</a></li>
                        <li><a href="{{ url('/language') }}">Kalbos</a></li>
                        <li><a href="{{ url('/type') }}">Tipai</a></li>
                        <li><a href="{{ url('/genres') }}">Žanrai</a></li>
                        <li><a href="{{ url('/publishing-house') }}">Leidyklos</a></li>
                        <li><a href="{{ url('/city') }}">Miestai</a></li>
                        <hr>
                        <!-- <li><a href="{{ url('/add-user') }}">Add users</a></li> -->
                        <li><a href="{{ url('/add-book') }}">Pridėti įrašą</a></li>
                        <hr>                    
                        <!-- <li><a href="{{ url('/register-book') }}">Register Book</a></li> -->
                        <li><a href="{{ url('/occupied-books') }}">Paimtos knygos ({{ count_occupied_books() }})</a></li>
                        <li><a href="{{ url('/continued-books') }}">Pratęstos knygos ({{ count_continued_books() }})</a></li>
                        <li><a href="{{ url('/reservations') }}">Rezervuotos knygos ({{ count_reserved_books() }})</a></li>
                        <li><a href="{{ url('/late-books') }}">Vėluojamos grąžinti knygos ({{ count_late_books() }})</a></li>
                        <li><a href="{{ url('/returned-books') }}">Grąžintos knygos ({{ count_returned_books() }})</a></li>
                        <hr>
                        <li><a href=" {{ url('/options') }} ">Nustatymai</a></li>
                    </ul>
                </div>
       
                <div class="col-md-10 main">
                    @include ('partials.message')
                    @yield('content')
                    {{--
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('add-url') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            @foreach ($first_level_results as $first_level_result)
                            <select class="form-control udk-select" name="{{ $first_level_result['id'] }}" title="{{ $first_level_result['title'] }}" style="color: #999999;">
                                <ul>
                                <option class="first-level" style="color: #999999;" value="not-selected"> {{ $first_level_result['title'] }} </option>
                                <option class="first-level" style="font-size: 16px; font-weight: 600; color: #000;" value="{{ $first_level_result['title'] }}"> {{ $first_level_result['title'] }} </option>
                                @foreach ($second_level_results as $second_level_result)
                                    @if ($first_level_result['id'] == $second_level_result['first_level_id'])
                                        <option class="second-level" style="font-size: 14px; font-weight: 500; color: #000;" value="{{ $second_level_result['code'] }}"> {{ $second_level_result['title'] }} </option>
                                        <ul>
                                        @foreach ($third_level_results as $third_level_result)
                                            @if ($first_level_result['id'] == $second_level_result['first_level_id'] && $first_level_result['id'] == $third_level_result['first_level_id'] && $second_level_result['id'] == $third_level_result['second_level_id'])
                                                <option class="third-level" style="font-size: 12px; font-weight: 300; color: #000;" value="{{ $third_level_result['code'] }}">{{ $third_level_result['title'] }} </option>
                                            @endif
                                        @endforeach
                                        </ul>
                                    @endif
                                @endforeach
                                </ul>
                            </select>
                            @endforeach

                            <div class="form-group">
                            <label class="col-sm-1 control-label" for="genre">Genre</label>
                            <div class="col-sm-5">
                              <select class="form-control" id="genre" name="genre">
                              <option value="0">Select a genre</option>
                              <option value="other" @if (old('genre') == 'other') {{ 'selected="selected"' }} @endif>Kitas</option>
                                @if ($genres->count())
                                  @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}" @if (old('genre') == $genre->id) {{ 'selected="selected"' }} @endif >{{ $genre->genre }}</option>
                                  @endforeach
                                @endif
                              </select>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" name="create" value="create" class="btn btn-primary">Add new</button>
                                </div>
                            </div>
                        </form>
                        
                        <h1>{{ $string }}</h1>
                    --}}
                    <!-- <h1>Labas</h1>
                    <div id="container" style="width:100%; height:400px;"></div>

                    <script type="text/javascript">
                        $(function () { 
                            var myChart = Highcharts.chart('container', {
                                chart: {
                                    type: 'bar'
                                },
                                title: {
                                    text: 'Fruit Consumption'
                                },
                                xAxis: {
                                    categories: ['Apples', 'Bananas', 'Oranges']
                                },
                                yAxis: {
                                    title: {
                                        text: 'Fruit eaten'
                                    }
                                },
                                series: [{
                                    name: 'Jane',
                                    data: [1, 0, 4]
                                }, {
                                    name: 'John',
                                    data: [5, 7, 3]
                                }]
                            });
                        });
                    </script> -->
                </div>
            </div>
        </div>
         @endif
        



    @include ('partials.footer')

    </body>
</html>

<script>
    $('.udk-select').on('click', function() {
        if($(this).val() !== 'not-selected') {
            $(this).css( "color", "#000" );
        } else {
            $(this).css("color", "#999999");
        }  
    });
</script>