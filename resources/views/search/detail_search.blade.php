@extends('welcome')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">Paieška</div>
    <div class="panel-body">
    	<form class="form-horizontal" role="form" method="GET" action="{{ url('/detail-search/search') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="search" class="col-sm-1 control-label">Paieška</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" id="search" name="search"></input>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Detali paieška
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="title" class="col-sm-1 control-label">Pavadinimas</label>
                            <div class="col-sm-11">
                                <input type="text" class="form-control" id="title" placeholder="Pavadinimas" name="title" value="{{ old('title') }}">
                            </div>
                        </div>
      
                        <div class="form-group">
                            <label class="col-sm-1 control-label" for="author">Autorius</label>
                            <div class="col-sm-3">
                                <select class="form-control" id="author" name="author">
                                    <option value="0">Pasirinkti autorių</option>
                                    @if ($authors->count())
                                        @foreach ($authors as $author)
                                            <option value="{{ $author->id }}" @if (old('author') == $author->id) {{ 'selected="selected"' }} @endif >{{ $author->author_name }} {{ $author->author_surname }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="isbn" class="col-sm-1 control-label">ISBN</label>
                            <div class="col-sm-11">
                                <input type="text" class="form-control" id="isbn" placeholder="ISBN" name="isbn" value="{{ old('isbn') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="date" class="col-sm-1 control-label">Data</label>
                            <div class="col-sm-11">
                                <input type="text" class="form-control" id="date" placeholder="Data" name="date" value="{{ old('date') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="size" class="col-sm-1 control-label">Dydis</label>
                            <div class="col-sm-11">
                                <input type="text" class="form-control" id="size" placeholder="Dydis" name="size" value="{{ old('size') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-1 control-label" for="language">Kalba</label>
                            <div class="col-sm-5">
                                <select class="form-control" id="language" name="language">
                                    <option value="0">Pasirinkti kalbą</option>
                                    @if ($languages->count())
                                        @foreach ($languages as $language)
                                            <option value="{{ $language->id }}" @if (old('language') == $language->id) {{ 'selected="selected"' }} @endif >
                                                {{ $language->language }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-1 control-label" for="type">Tipas</label>
                            <div class="col-sm-5">
                                <select class="form-control" id="type" name="type">
                                    <option value="0">Pasirinkti tipą</option>
                                    @if ($types->count())
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}" @if (old('type') == $type->id) {{ 'selected="selected"' }} @endif >{{ $type->type }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="udk" class="col-sm-1 control-label">UDK</label>
                            <div class="col-sm-11">
                                <input type="text" class="form-control" id="udk" placeholder="UDK" name="udk" value="{{ old('udk') }}">
                            </div>
                        </div>
            
                        <div class="form-group">
                            <label class="col-sm-1 control-label" for="publishing_house">Leidykla</label>
                            <div class="col-sm-5">
                                <select class="form-control" id="publishing_house" name="publishing_house">
                                    <option value="0">Pasirinkti leidyklą</option>
                                    @if ($publishing_houses->count())
                                        @foreach ($publishing_houses as $publishing_house)
                                            <option value="{{ $publishing_house->id }}" @if (old('publishing_house') == $publishing_house->id) {{ 'selected="selected"' }} @endif >{{ $publishing_house->publishing_house }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-1 control-label" for="city">Miestas</label>
                            <div class="col-sm-5">
                                <select class="form-control" id="city" name="city">
                                    <option value="0">Pasirinkti miestą</option>
                                    @if ($cities->count())
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}" @if (old('city') == $city->id) {{ 'selected="selected"' }} @endif >{{ $city->city }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        {{--
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

                        <select class="form-control" id="genre" name="genre">
                            <option value="0">Romanai</option>
                              @if ($genres->count())
                                @foreach ($genres as $genre)
                                  <option value="{{ $genre->id }}" @if (old('genre') == $genre->id) {{ 'selected="selected"' }} @endif >{{ $genre->genre }}</option>
                                @endforeach
                              @endif
                        </select>
                        --}}
                    </div>
                </div>
            </div>



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
                    <th class="mobile">Dydis</th>
                    <th class="mobile">Kalba</th>
                    <th class="mobile">Rūšis</th>
                    <th class="mobile">Kiekis</th>
                    <th class="mobile">Laisvos</th>
                    <th class="mobile">Žanras</th>
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
                                <td>
                                    @foreach(get_authors($books[$i]->id) as $author)
                                        @if(count(get_authors($books[$i]->id)) > 1)
                                            {{ get_author_name($author->author_id) }}, 
                                        @else
                                            {{ get_author_name($author->author_id) }}
                                        @endif
                                    @endforeach
                                </td>
                                <td class="mobile">{{ $books[$i]->size }}</td>
                                <td class="mobile">{{ get_language($books[$i]->language) }}</td>
                                <td class="mobile">{{ get_type($books[$i]->type) }}</td>
                                <td class="mobile">{{ $books[$i]->quantity }}</td>
                                <td class="mobile"> {{ count_free_books($books[$i]->id) }} </td>
                                <td class="mobile">{{ $books[$i]->genre }}</td>
                                <td><a type="button" type="button" data-toggle="modal" style="cursor:pointer" data-target="#aboutModal{{ $books[$i]->id }}">About {{ $books[$i]->title }}</a>
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
                                                    <h4 class="modal-title">Panaikinti knygą</h4>
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
                    <th class="mobile">Dydis</th>
                    <th class="mobile">Kalba</th>
                    <th class="mobile">Rūšis</th>
                    <th class="mobile">Kiekis</th>
                    <th class="mobile">Laisvos</th>
                    <th class="mobile">Žanras</th>
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