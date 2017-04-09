@extends('welcome')

@section('content')

@if($errors->any())
    <script>
        $(function() {
            $('#booksEdit{{session('wrong_id')}}').modal('show');
        });
    </script>
@endif
<div class="panel panel-primary">
    <div class="panel-heading">Books</div>
    <div class="panel-body">
        <table class="table table-striped table-hover table-condensed">
            <thead>
                <tr class="info">
                    <th>#</th>
                    <th><a href="{{ action('BookController@orderByTitle') }}">Title</a></th>
                    <th><a href="{{ action('BookController@orderByAuthor') }}">Author</a></th>
                    <th><a href="{{ action('BookController@orderByISBN') }}">ISBN</a></th>
                    <th><a href="{{ action('BookController@orderByDate') }}">Date</a></th>
                    <th><a href="{{ action('BookController@orderBySize') }}">Size</a></th>
                    <th><a href="{{ action('BookController@orderByLanguage') }}">Language</a></th>
                    <th><a href="{{ action('BookController@orderByType') }}">Rusis</a></th>
                    <th><a href="{{ action('BookController@orderByUDK') }}">UDK</a></th>
                    <th><a href="{{ action('BookController@orderByQuantity') }}">Kiekis</a></th>
                    <th><a href="#">Publishing house</a></th>
                    <th><a href="#">City</a></th>
                    <th><a href="#">Genre</a></th>
                    <th>About</th>
                    <th>Add to cart</th>
                    @if (Auth::user())
                    @if (Auth::user()->hasRole("admin"))
                    <th>Action</th>
                    @endif
                    @endif
                </tr>
            </thead>
            <tbody>
                @if ($books->count())
                    @for ($i = 0; $i < count($books); $i++)
                        <tr>
                            <th>{{ $i+1 }}</th>
                                <td><a href="{{ url('/book/' . $books[$i]->id ) }}">{{ $books[$i]->title }}</a></td>
                                <td>{{ get_author_name($books[$i]->author) }} {{ get_author_surname($books[$i]->author) }}</td>
                                <td>{{ $books[$i]->isbn }}</td>
                                <td>{{ $books[$i]->date }}</td>
                                <td>{{ $books[$i]->size }}</td>
                                <td>{{ $books[$i]->language }}</td>
                                <td>{{ get_type($books[$i]->type) }}</td>
                                <td>{{ $books[$i]->udk }}</td>
                                <td>{{ $books[$i]->quantity }}</td>
                                <td>{{ $books[$i]->publishing_house }}</td>
                                <td>{{ $books[$i]->city }}</td>
                                <td>{{ get_genre($books[$i]->genre) }}</td>
                                <td><a type="button" type="button" data-toggle="modal" style="cursor:pointer" data-target="#aboutModal{{ $books[$i]->id }}">About {{ $books[$i]->title }}</a>
                                    <div class="modal fade" id="aboutModal{{ $books[$i]->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">About</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>{{ $books[$i]->about }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ url('/book/' . $books[$i]->id . '/add-to-cart' ) }}">Add</a>
                                </td>
                                @if (Auth::user())
                                @if (Auth::user()->hasRole("admin"))
                                <td>
                                    <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#booksEdit{{ $books[$i]->id }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
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
                                                                    <option value="{{ $books[$i]->language }}">{{ get_language($books[$i]->language) }}</option>
                                                                    @if (get_all_languages($books[$i]->language)->count())
                                                                        @foreach (get_all_languages($books[$i]->language) as $language)
                                                                            <option value="{{ $language->id }}" @if (old('language') == $language->id) {{ 'selected="selected"' }} @endif >{{ $language->language }}</option>
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
                                    </div>
                                    <!-- <a class="btn btn-default btn-xs" href="{{ url('/book/' . $books[$i]->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> -->
                                    <a class="btn btn-default btn-xs" href="#" data-toggle="modal" data-target="#books-delete-modal" data-books-title="{{ $books[$i]->title }}" data-books-author="{{ $books[$i]->author }}" data-books-isbn="{{ $books[$i]->isbn }}" data-books-id="{{ $books[$i]->id }}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                </td>
                                @endif
                                @endif
                            <td>
                        </tr>
                    @endfor
                @else
                    <tr>
                        <td class="text-center" colspan="8">List Is Empty.</td>
                    </tr>
                @endif
            </tbody>
            
            <tfoot>
                <tr class="info">
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>ISBN</th>
                    <th>Date</th>
                    <th>Size</th>
                    <th>Language</th>
                    <th>Rusis</th>
                    <th>UDK</th>
                    <th>Kiekis</th>
                    <th>Publishing house</th>
                    <th>City</th>
                    <th>Genre</th>
                    <th>About</th>
                    <th>Add to cart</th>
                    @if (Auth::user())
                    @if (Auth::user()->hasRole("admin"))
                    <th>Action</th>
                    @endif
                    @endif
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@if (Auth::user())
@if (Auth::user()->hasRole("admin"))
<div class="modal fade" id="books-delete-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    <h4 class="modal-title">Delete book</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/book/' . 0 . '/delete') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="book_id" value="" id="bookid">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Title:</label>
                            <div class="col-sm-8">
                                <p class="form-control-static" id="bookTitle"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Author:</label>
                            <div class="col-sm-8">
                                <p class="form-control-static" id="bookAuthor"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Isbn:</label>
                            <div class="col-sm-8">
                                <p class="form-control-static" id="bookIsbn"></p>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" onclick="$(this).closest('.modal').find('form').submit();">Delete</button>
                </div>
            </div>
        </div>
</div>
@endif
@endif

@endsection