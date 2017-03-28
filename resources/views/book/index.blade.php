@extends('welcome')

@section('content')

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
                    <th><a href="#">Publishing houser</a></th>
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
                                <td>{{ get_language($books[$i]->language) }}</td>
                                <td>{{ get_type($books[$i]->type) }}</td>
                                <td>{{ $books[$i]->udk }}</td>
                                <td>{{ $books[$i]->quantity }}</td>
                                <td>{{ $books[$i]->publishing_house }}</td>
                                <td>{{ $books[$i]->city }}</td>
                                <td>{{ $books[$i]->genre }}</td>
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
                                    <a class="btn btn-default btn-xs" href="{{ url('/book/' . $books[$i]->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
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
                    <th>Publishing houser</th>
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