@extends('welcome')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">Shopping cart</div>
    <div class="panel-body">
    @if(Session::has('cart'))
    <form class="form-horizontal" role="form" method="POST" action="{{ url('shopping-cart/order') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table class="table table-striped table-hover table-condensed">
            <thead>
                <tr class="info">
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>ISBN</th>
                    <th>UDK</th>
                    <th>About</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($books as $book)
                        <tr>
                                <td>{{ $book['item']['title'] }}</td>
                                <td></td>
                                <td>{{ $book['item']['isbn'] }}</td>
                                <td>{{ $book['item']['udk'] }}</td>
                                <td><a type="button" type="button" data-toggle="modal" style="cursor:pointer" data-target="#aboutModal{{ $book['item']['id'] }}">About {{ $book['item']['title'] }}</a>
                                    <div class="modal fade" id="aboutModal{{ $book['item']['id'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">About</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>{{ $book['item']['about'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            <td>
                        </tr>
                    @endforeach
            </tbody>
            
            <tfoot>
                <tr class="info">
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>ISBN</th>
                    <th>UDK</th>
                    <th>About</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
        <div class="form-group">
        <label for="comment" class="col-sm-2 control-label">Comment</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="comment" placeholder="Comment" name="comment" value="{{ old('comment') }}">
        </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="create" value="create" class="btn btn-primary">Order</button>
            </div>
        </div>
    </form>
    @else
    <h1>Nieko nera</h1>
    @endif
    </div>
</div>


@endsection