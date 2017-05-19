@extends('welcome')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">{{ $book->title }}<br>
        <small><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span> {{ get_average_rating($book->id) }} ( {{ count_ratings($book->id) }} )</small><br>
        <small><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> {{ count_comments($book->id) }} </small>
        @if (Auth::user()->hasRole("admin"))
        <a class="btn btn-default btn-xs" style="float: right;" data-toggle="modal" data-target="#booksEdit{{ $book->id }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
        <a class="btn btn-default btn-xs" style="float: right;" data-toggle="modal" data-target="#books-delete-modal{{$book->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
        @endif
    </div>
    <div class="panel-body">
        <div class="col-md-4">
            
        </div>
        <div class="col-md-8">
            <div class="row form-group">
                <label class="col-sm-2 control-label" for="title">Title</label>
                <div class="col-sm-10">
                    <p>{{ $book->title }}</p>
                </div>
            </div>

            <div class="row form-group">
                <label class="col-sm-2 control-label" for="title">Author</label>
                <div class="col-sm-10">
                    <p>{{ get_author_name($book->author) }}</p>
                </div>
            </div>

            <div class="row form-group">
                <label class="col-sm-2 control-label" for="title">ISBN</label>
                <div class="col-sm-10">
                    <p>{{ $book->isbn }}</p>
                </div>
            </div>

            <div class="row form-group">
                <label class="col-sm-2 control-label" for="title">Date</label>
                <div class="col-sm-10">
                    <p>{{ $book->date }}</p>
                </div>
            </div>

            <div class="row form-group">
                <label class="col-sm-2 control-label" for="title">Size</label>
                <div class="col-sm-10">
                    <p>{{ $book->size }}</p>
                </div>
            </div>

            <div class="row form-group">
                <label class="col-sm-2 control-label" for="title">Language</label>
                <div class="col-sm-10">
                    <p>{{ get_language($book->language) }}</p>
                </div>
            </div>

            <div class="row form-group">
                <label class="col-sm-2 control-label" for="title">Type</label>
                <div class="col-sm-10">
                    <p>{{ get_type($book->type) }}</p>
                </div>
            </div>

            <div class="row form-group">
                <label class="col-sm-2 control-label" for="title">UDK</label>
                <div class="col-sm-10">
                    <p>{{ $book->udk }}</p>
                </div>
            </div>

            <div class="row form-group">
                <label class="col-sm-2 control-label" for="title">Quantity</label>
                <div class="col-sm-10">
                    <p>{{ $book->quantity }}</p>
                </div>
            </div>

            <div class="row form-group">
                <label class="col-sm-2 control-label" for="title">Publishing house</label>
                <div class="col-sm-10">
                    <p>{{ get_publishing_house($book->publishing_house) }}</p>
                </div>
            </div>

            <div class="row form-group">
                <label class="col-sm-2 control-label" for="title">City</label>
                <div class="col-sm-10">
                    <p>{{ get_city($book->city) }}</p>
                </div>
            </div>

            <div class="row form-group">
                <label class="col-sm-2 control-label" for="title">About</label>
                <div class="col-sm-10">
                    <p>{{ $book->about }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">Additional information</div>
    <div class="panel-body">
        <div class="col-md-12">
            <div class="form-group">
                <label class="col-sm-2 control-label">Knyga buvo paimta:</label>
                <div class="col-sm-10">
                    <p>{{ count_book_taken_times($book->id) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@if (Auth::user())
<div class="panel panel-primary">
    <div class="panel-heading">Rate This</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/book/' . $book->id . '/rate') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            
                <label class="col-sm-2 control-label" for="rate">Rate This</label>
                    
                    

                    <!-- <input id="input-1" name="input-1" value="1" name="rating"> -->
          {{ get_average_rating($book->id) }}
   

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4" style="font-size: 18px;">
                    <button type="submit" class="submit-1" name="book_rating" value="1" style="background-color: transparent; border: 0; padding: 0;"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span></button>
                    <button type="submit" class="submit-2" name="book_rating" value="2" style="background-color: transparent; border: 0; padding: 0;"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span></button>
                    <button type="submit" class="submit-3" name="book_rating" value="3" style="background-color: transparent; border: 0; padding: 0;"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span></button>
                    <button type="submit" class="submit-4" name="book_rating" value="4" style="background-color: transparent; border: 0; padding: 0;"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span></button>
                    <button type="submit" class="submit-5" name="book_rating" value="5" style="background-color: transparent; border: 0; padding: 0;"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span></button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
$(document).ready(function(){
    $( ".submit-1" ).mouseenter(function() {
        $('.glyphicon-star').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
        $('.submit-1 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
    });
    $( ".submit-2" ).mouseenter(function() {
        $('.glyphicon-star').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
        $('.submit-1 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        $('.submit-2 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
    });
    $( ".submit-3" ).mouseenter(function() {
        $('.glyphicon-star').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
        $('.submit-1 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        $('.submit-2 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        $('.submit-3 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
    });
    $( ".submit-4" ).mouseenter(function() {
        $('.glyphicon-star').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
        $('.submit-1 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        $('.submit-2 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        $('.submit-3 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        $('.submit-4 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
    });
    $( ".submit-5" ).mouseenter(function() {
        $('.glyphicon-star').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
        $('.submit-1 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        $('.submit-2 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        $('.submit-3 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        $('.submit-4 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        $('.submit-5 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
    });

    $('.submit-1').on('click', function(event){ 
        $('.glyphicon-star').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
        $('.submit-1 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
    });
    $('.submit-2').on('click', function(event){ 
        $('.glyphicon-star').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
        $('.submit-1 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        $('.submit-2 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
    });
    $('.submit-3').on('click', function(event){ 
        $('.glyphicon-star').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
        $('.submit-1 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        $('.submit-2 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        $('.submit-3 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
    });
    $('.submit-4').on('click', function(event){ 
        $('.glyphicon-star').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
        $('.submit-1 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        $('.submit-2 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        $('.submit-3 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        $('.submit-4 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
    });
    $('.submit-5').on('click', function(event){ 
        $('.glyphicon-star').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
        $('.submit-1 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        $('.submit-2 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        $('.submit-3 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        $('.submit-4 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
        $('.submit-5 span').removeClass('glyphicon-star-empty').addClass('glyphicon-star');
    });
});
</script>
<div class="panel panel-primary">
    <div class="panel-heading">Add Comment</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/book/' . $book->id . '/addComment') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="col-sm-2 control-label" for="comment">Comment</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="book_comment" name="comment" value="">
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
</div>
@endif

@if(count($comments) > 0)
<div class="panel panel-primary">
    <div class="panel-heading">Comments</div>
    <div class="panel-body">
        <div class="col-md-4">
            
        </div>
        <div class="col-md-8">
        @if ($comments->count())
            @for ($i = 0; $i < count($comments); $i++)
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2 col-sm-2">
                            <label class="control-label" for="title">{{ get_user_name($comments[$i]->user_id) }}</label>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <p>{{ $comments[$i]->comment }}</p>
                        </div>
                        @if (((Auth::user()->id) == ($comments[$i]->user_id)) || Auth::user()->hasRole("admin"))
                            <div class="col-md-1 col-sm-1">
                                <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#editComment{{ $comments[$i]->id }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                <div class="modal fade" id="editComment{{ $comments[$i]->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                            @include ('partials.notice')
                                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/book/' . $comments[$i]->id . '/editComment') }}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="title">Comment</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="comment" name="comment" value="{{ old('comments', $comments[$i]->comment) }}">
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
                            </div>
                            <div class="col-md-1 col-sm-1">
                                <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#deleteComment{{ $comments[$i]->id }}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                <div class="modal fade" id="deleteComment{{ $comments[$i]->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                            @include ('partials.notice')
                                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/book/' . $comments[$i]->id . '/deleteComment') }}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label" for="title">Comment</label>
                                                    <div class="col-sm-10">
                                                        {{$comments[$i]->comment }}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h4>Ar tikrai norite ištrinti komentarą?</h4>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <button type="submit" class="btn btn-danger" onclick="$(this).closest('.modal').find('form').submit();">Delete</button>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endfor
        @endif
        </div>
    </div>
</div>
@endif

@if (Auth::user()->hasRole("admin"))
<div class="modal fade" id="booksEdit{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{$book->title}}</h4>
            </div>
            <div class="modal-body">
            @include ('partials.notice')
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/book/' . $book->id . '/edit') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="title">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $book->title) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="author">Author</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="author" name="author">
                                <option value="0">Select author</option>
                                @if ($authors->count())
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}" @if ($book->author == $author->id) {{ 'selected="selected"' }} @endif >{{ $author->author_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="isbn">Isbn</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="isbn" name="isbn" value="{{ old('isbn', $book->isbn) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="date">Date</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="date" name="date" value="{{ old('date', $book->date) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="size">Size</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="size" name="size" value="{{ $book->size }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="language">Language</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="language" name="language">
                                @if ($languages->count())
                                  @foreach ($languages as $language)
                                    <option value="{{ $language->id }}" @if ($book->language == $language->language) {{ 'selected="selected"' }} @endif > 
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
                                <option value="{{ $book->type }}">{{ get_type($book->type) }}</option>
                                @if (get_all_types($book->type)->count())
                                    @foreach (get_all_types($book->type) as $type)
                                        <option value="{{ $type->id }}" @if (old('type') == $type->id) {{ 'selected="selected"' }} @endif >{{ $type->type }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="quantity">Quantity</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="quantity" name="quantity" value="{{ $book->quantity }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="publishing_house">Publishing house</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="publishing_house" name="publishing_house">
                                <option value="0">Select a publishing house</option>
                                @if ($publishing_houses->count())
                                    @foreach ($publishing_houses as $publishing_house)
                                        <option value="{{ $publishing_house->id }}" @if ($book->publishing_house == $publishing_house->id) {{ 'selected="selected"' }} @endif >{{ $publishing_house->publishing_house }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="city">City</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="city" name="city">
                                <option value="0">Select a city</option>
                                @if ($cities->count())
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" @if ($book->city == $city->id) {{ 'selected="selected"' }} @endif >{{ $city->city }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="genre">Genre</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="genre" name="genre">
                                <option value="{{ $book->genre }}">{{ get_genre($book->genre) }}</option>
                                @if (get_all_genres($book->genre)->count())
                                    @foreach (get_all_genres($book->genre) as $genre)
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
<div class="modal fade" id="books-delete-modal{{$book->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                <h4 class="modal-title">Delete book</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/book/' .$book->id .'/delete') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Book title</h5>
                        </div>
                        <div>
                            <p>{{ $book->title }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Book author</h5>
                        </div>
                        <div>
                            <p>{{ get_author_name($book->author) }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Ar tikrai norite istrinti?</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-danger" onclick="$(this).closest('.modal').find('form').submit();">Delete</button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
@endif
@endsection