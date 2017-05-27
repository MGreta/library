@extends('welcome')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">Knygos</div>
    <div class="panel-body">
    	<form class="form-horizontal" role="form" method="GET" action="{{ url('/search/search') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
    		<input type="text" class="form-control" id="search" name="search"></input>
    		<div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Ieškoti</button>
            </div>
        </form>
        <table class="table table-striped table-hover table-condensed">
            <thead>
                <tr class="info">
                    <th>#</th>
                    <th>Pavadinimas</th>
                    <th>Autorius</th>
                    <th>Dydis</th>
                    <th>Kalba</th>
                    <th>Rūšis</th>
                    <th>Kiekis</th>
                    <th>Laisvos</th>
                    <th>Žanras</th>
                    <th>Apie</th>
                    <th>Įdėti į krepšelį</th>
                    @if (Auth::user())
                    @if (Auth::user()->hasRole("admin"))
                    <th>Veiksmas</th>
                    @endif
                    @endif
                </tr>
            </thead>
            <tbody>
                @if ($books->count())
                    @for ($i = 0; $i < count($books); $i++)
                        <tr>
                            <th>{{ $i+1 }}</th>
                                <td>
                                	<a href="{{ url('/book/' . $books[$i]->id ) }}">{{ $books[$i]->title }}</a>
                                    <small><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span> {{ get_average_rating($books[$i]->id) }}</small>
                                    <small><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> {{ count_comments($books[$i]->id) }} </small>
                                </td>
                                <td>{{ get_author_name($books[$i]->author) }}</td>
                                <td>{{ $books[$i]->size }}</td>
                                <td>{{ $books[$i]->language }}</td>
                                <td>{{ get_type($books[$i]->type) }}</td>
                                <td>{{ $books[$i]->quantity }}</td>
                                <td> {{ count_free_books($books[$i]->id) }} </td>
                                <td>{{ get_genre($books[$i]->genre) }}</td>
                                <td><a type="button" type="button" data-toggle="modal" style="cursor:pointer" data-target="#aboutModal{{ $books[$i]->id }}">Apie {{ $books[$i]->title }}</a>
                                    <div class="modal fade" id="aboutModal{{ $books[$i]->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Apie</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>{{ $books[$i]->about }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ url('/book/' . $books[$i]->id . '/add-to-cart' ) }}">Pridėti</a>
                                </td>
                                @if (Auth::user())
                                @if (Auth::user()->hasRole("admin"))
                                <td>
                                    {{--<a class="btn btn-default btn-xs" data-toggle="modal" data-target="#booksEdit{{ $books[$i]->id }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                    <div class="modal fade" id="booksEdit{{ $books[$i]->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">{{$books[$i]->title}}</h4>
                                                </div>
                                                <div class="modal-body">
                                                @include ('partials.notice')
                                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/book/' . $books[$i]->id . '/edit') }}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="title">Title</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $books[$i]->title) }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="author">Author</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="author" name="author" value="{{ old('author', $books[$i]->author) }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="isbn">Isbn</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="isbn" name="isbn" value="{{ old('isbn', $books[$i]->isbn) }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="date">Date</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="date" name="date" value="{{ old('date', $books[$i]->date) }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="size">Size</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="size" name="size" value="{{ $books[$i]->size }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="language">Language</label>
                                                            <div class="col-sm-10">
                                                                <select class="form-control" id="language" name="language">
                                                                    @if ($languages->count())
                                                                      @foreach ($languages as $language)
                                                                        <option value="{{ $language->id }}" @if ($books[$i]->language == $language->language) {{ 'selected="selected"' }} @endif > 
                                                                            {{ $language->language }}
                                                                        </option>
                                                                      @endforeach
                                                                    @endif
                                                                </select>                                                                
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="type">Type</label>
                                                            <div class="col-sm-10">
                                                                <select class="form-control" id="type" name="type">
                                                                    <option value="{{ $books[$i]->type }}">{{ get_type($books[$i]->type) }}</option>
                                                                    @if (get_all_types($books[$i]->type)->count())
                                                                        @foreach (get_all_types($books[$i]->type) as $type)
                                                                            <option value="{{ $type->id }}" @if (old('type') == $type->id) {{ 'selected="selected"' }} @endif >{{ $type->type }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="udk">Udk</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="udk" name="udk" value="{{ $books[$i]->udk }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="quantity">Quantity</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="quantity" name="quantity" value="{{ $books[$i]->quantity }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="publishing_house">Publishing house</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="publishing_house" name="publishing_house" value="{{ $books[$i]->publishing_house }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="city">City</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="city" name="city" value="{{ $books[$i]->city }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="genre">Genre</label>
                                                            <div class="col-sm-10">
                                                                <select class="form-control" id="genre" name="genre">
                                                                    <option value="{{ $books[$i]->genre }}">{{ get_genre($books[$i]->genre) }}</option>
                                                                    @if (get_all_genres($books[$i]->genre)->count())
                                                                        @foreach (get_all_genres($books[$i]->genre) as $genre)
                                                                            <option value="{{ $genre->id }}" @if (old('genre') == $genre->id) {{ 'selected="selected"' }} @endif >{{ $genre->genre }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-md-6 col-md-offset-4">
                                                                <button type="submit" class="btn btn-primary">
                                                                    Save Changes
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>--}}
                                    <a class="btn btn-default btn-xs" href="{{ url('/book/' . $books[$i]->id . '/edit' ) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                    <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#books-delete-modal{{$books[$i]->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                    <div class="modal fade" id="books-delete-modal{{$books[$i]->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                    <h4 class="modal-title">Panaikinti</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/book/' .$books[$i]->id .'/delete') }}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <h5>Pavadinimas</h5>
                                                            </div>
                                                            <div>
                                                                <p>{{ $books[$i]->title }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <h5>Autorius</h5>
                                                            </div>
                                                            <div>
                                                                <p>{{ get_author_name($books[$i]->author) }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h4>Ar tikrai norite ištrinti?</h4>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <button type="submit" class="btn btn-danger" onclick="$(this).closest('.modal').find('form').submit();">Panaikinti</button>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Uždaryti</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @endif
                                @endif
                        </tr>
                    @endfor
                @else
                    <tr>
                        <td class="text-center" colspan="8">Sąrašas tuščias.</td>
                    </tr>
                @endif
            </tbody>
            
            <tfoot>
                <tr class="info">
                    <th>#</th>
                    <th>Pavadinimas</th>
                    <th>Autorius</th>
                    <th>Dydis</th>
                    <th>Kalba</th>
                    <th>Rūšis</th>
                    <th>Kiekis</th>
                    <th>Laisvos</th>
                    <th>Žanras</th>
                    <th>Apie</th>
                    <th>Įdėti į krepšelį</th>
                    @if (Auth::user())
                    @if (Auth::user()->hasRole("admin"))
                    <th>Veiksmas</th>
                    @endif
                    @endif
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection