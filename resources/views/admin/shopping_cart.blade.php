@extends('welcome')

@section('content')
@include ('partials.message')
@if(!empty($successMsg))
  <div class="alert alert-success"> {{ $will_be_free->book_id }} {{ $successMsg }} {{$will_be_free->end_day}} </div>
@endif
<div class="panel panel-primary">
    <div class="panel-heading">Rezervacija</div>
    <div class="panel-body">
    @if(Session::has('cart'))
    <form class="form-horizontal" role="form" method="POST" action="{{ url('admin-shopping-cart/order') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table class="table table-striped table-hover table-condensed">
            <thead>
                <tr class="info">
                    <th>#</th>
                    <th>Pavadinimas</th>
                    <th>Autorius</th>
                    <th>ISBN</th>
                    <th>UDK</th>
                    <th>Apie</th>
                    <th>Veiksmai</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td><a href="{{ url('/book/' . $book['item']['id'] ) }}">{{ $book['item']['title'] }}</a></td>
                            <td></td>
                            <td>{{ $book['item']['isbn'] }}</td>
                            <td>{{ $book['item']['udk'] }}</td>
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
                    <th>#</th>
                    <th>Pavadinimas</th>
                    <th>Autorius</th>
                    <th>ISBN</th>
                    <th>UDK</th>
                    <th>Apie</th>
                    <th>Veiksmai</th>
                </tr>
            </tfoot>
        </table>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="user">Vartotojai</label>
            <div class="col-sm-3">
                <select class="form-control" id="user" name="user">
                    <option value="0">Pasirinkite vartotoją</option>
                    @if ($users->count())
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @if (old('user') == $user->id) {{ 'selected="selected"' }} @endif >{{ $user->name }} {{ $user->last_name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        {{--
        <div class="form-group">
            <label for="comment" class="col-sm-2 control-label">Komentaras</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="comment" placeholder="Komentaras" name="comment" value="{{ old('comment') }}">
            </div>
        </div>
        --}}
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