<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Library</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">            
            <div class="navbar-form navbar-left">
                <ul class="nav navbar-nav">
                    <li><a href=" {{ url('/detail-search') }} ">Detali paieška</a></li>
                    <li class="header-search">
                        <form class="form-horizontal" role="form" method="GET" action="{{ url('/search/search') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" placeholder="Paieška" name="search" value="{{ old('search') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="submit" value="submit">Ieškoti</button>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ url('/shopping-cart') }}"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Rezervacija
                    <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                    </a>
                </li>
                <li><a href="{{ url('/profile') }}">Profilis</a></li>
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
                <!-- <li><a href="#">Register</a></li> -->
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>