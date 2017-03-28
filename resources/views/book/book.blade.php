@extends('welcome')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">{{ $book->title }}<br><small><i class="fa fa-star" aria-hidden="true"></i> {{ get_average_rating($book->id) }}</small></div>
    <div class="panel-body">
        <div class="col-md-4">
            
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="title">Title</label>
                <div class="col-sm-10">
                    <p>{{ $book->title }}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="title">Author</label>
                <div class="col-sm-10">
                    <p>{{ get_author_name($book->author) }} {{ get_author_surname($book->author) }}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="title">ISBN</label>
                <div class="col-sm-10">
                    <p>{{ $book->isbn }}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="title">Date</label>
                <div class="col-sm-10">
                    <p>{{ $book->date }}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="title">Size</label>
                <div class="col-sm-10">
                    <p>{{ $book->size }}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="title">Language</label>
                <div class="col-sm-10">
                    <p>{{ get_language($book->language) }}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="title">Type</label>
                <div class="col-sm-10">
                    <p>{{ get_type($book->type) }}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="title">UDK</label>
                <div class="col-sm-10">
                    <p>{{ $book->udk }}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="title">Quantity</label>
                <div class="col-sm-10">
                    <p>{{ $book->quantity }}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="title">Publishing house</label>
                <div class="col-sm-10">
                    <p>{{ $book->publishing_house }}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="title">City</label>
                <div class="col-sm-10">
                    <p>{{ $book->city }}</p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="title">About</label>
                <div class="col-sm-10">
                    <p>{{ $book->about }}</p>
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
          
   

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" name="book_rating" value="1"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span></button>
                    <button type="submit" name="book_rating" value="2"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span></button>
                    <button type="submit" name="book_rating" value="3"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span></button>
                    <button type="submit" name="book_rating" value="4"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span></button>
                    <button type="submit" name="book_rating" value="5"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span></button>
                </div>
            </div>
        </form>
    </div>
</div>
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

<div class="panel panel-primary">
    <div class="panel-heading">Comments</div>
    <div class="panel-body">
        <div class="col-md-4">
            
        </div>
        <div class="col-md-8">
        @if ($comments->count())
            @for ($i = 0; $i < count($comments); $i++)
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="title">{{ $comments[$i]->user_id }}</label>
                    <div class="col-sm-10">
                        <p>{{ $comments[$i]->comment }}</p>
                    </div>
                </div>
            @endfor
        @endif
        </div>
    </div>
</div>
@endsection