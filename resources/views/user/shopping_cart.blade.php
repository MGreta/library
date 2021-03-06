@extends('welcome')

@section('content')
@include ('partials.message')
@if(!empty($successMsg))
    {{--<div class="alert alert-success"> {{ $will_be_free->book_id }} {{ $successMsg }} {{$will_be_free->end_day}} </div> --}}
    @foreach ($not_free as $not_free)
      <div class="alert alert-success"><p>{{ $not_free['book_title'] }} bus laisva {{ $not_free['end_day'] }}</p></div>
    @endforeach
@endif
<div class="panel panel-primary">
    <div class="panel-heading">Rezervacija</div>
    <div class="panel-body">
    @if(Session::has('cart'))
    <form class="form-horizontal" role="form" method="POST" action="{{ url('shopping-cart/order') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table class="table table-striped table-hover table-condensed">
            <thead>
                <tr class="info">
                    <th>Pavadinimas</th>
                    <th>Autorius</th>
                    <th>Apie</th>
                    <th>Veiksmas</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($books as $book)
                        <tr>
                                <td><a href="{{ url('/book/' . $book['item']['id'] ) }}">{{ $book['item']['title'] }}</a></td>
                                <td>
                                    @foreach(get_authors($book['item']['id']) as $author)
                                        @if(count(get_authors($book['item']['id'])) > 1)
                                            <a href="/author/{{ $author->author_id }}/books">{{ get_author_name($author->author_id) }}</a>, 
                                        @else
                                            <a href="/author/{{ $author->author_id }}/books">{{ get_author_name($author->author_id) }}</a>
                                        @endif
                                    @endforeach
                                </td>
                                <td><a type="button" type="button" data-toggle="modal" style="cursor:pointer" data-target="#aboutModal{{ $book['item']['id'] }}">About {{ $book['item']['title'] }}</a>
                                    <div class="modal fade" id="aboutModal{{ $book['item']['id'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Apie</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>{{ $book['item']['about'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-default btn-xs" href="{{ action('Book_reservationsController@getRemoveItem', ['id' => $book['item']['id']]) }}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                </td>
                        </tr>
                    @endforeach
            </tbody>
            
            <tfoot>
                <tr class="info">
                    <th>Pavadinimas</th>
                    <th>Autorius</th>
                    <th>Apie</th>
                    <th>Veiksmas</th>
                </tr>
            </tfoot>
        </table>
        <div class="form-group">
        <label for="comment" class="col-sm-2 control-label">Komentaras</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="comment" placeholder="Komentaras" name="comment" value="{{ old('comment') }}">
        </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="create" value="create" class="btn btn-primary">Rezervuoti</button>
            </div>
        </div>
    </form>
    @else
    <h1>Nieko nėra</h1>
    @endif
    </div>
</div>


@endsection