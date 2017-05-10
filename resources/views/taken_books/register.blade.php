@extends('welcome')

@section('content')

<div class="panel panel-primary">
  <div class="panel-heading">Register rezervation</div>
  <div class="panel-body">
      <table class="table table-striped table-hover table-condensed">
          <thead>
              <tr class="info">
                  <th>#</th>
                  <th><a href="{{ action('BookController@orderByTitle') }}">Title</a></th>
                  <th><a href="{{ action('BookController@orderByAuthor') }}">Author</a></th>
                  <th><a href="{{ action('BookController@orderByISBN') }}">ISBN</a></th>
                  <th><a href="{{ action('BookController@orderBySize') }}">Size</a></th>
                  <th><a href="{{ action('BookController@orderByLanguage') }}">Language</a></th>
                  <th><a href="{{ action('BookController@orderByType') }}">Rusis</a></th>
                  <th><a href="{{ action('BookController@orderByUDK') }}">UDK</a></th>
                  <th><a href="{{ action('BookController@orderByQuantity') }}">Kiekis</a></th>
                  <th>Laisvos</th>
                  <th><a href="{{ action('BookController@orderByGenre') }}">Genre</a></th>
                  <th>About</th>
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
                              <td><a href="{{ url('/book/' . $books[$i]->id ) }}">{{ $books[$i]->title }}</a>
                                  <small><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span> {{ get_average_rating($books[$i]->id) }}</small>
                                  <small><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> {{ count_comments($books[$i]->id) }} </small>
                              </td>
                              <td>{{ get_author_name($books[$i]->author) }} {{ get_author_surname($books[$i]->author) }}</td>
                              <td>{{ $books[$i]->isbn }}</td>
                              <td>{{ $books[$i]->size }}</td>
                              <td>{{ $books[$i]->language }}</td>
                              <td>{{ get_type($books[$i]->type) }}</td>
                              <td>{{ $books[$i]->udk }}</td>
                              <td>{{ $books[$i]->quantity }}</td>
                              <td> {{ count_free_books($books[$i]->id) }} </td>
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
                  <th>Size</th>
                  <th>Language</th>
                  <th>Rusis</th>
                  <th>UDK</th>
                  <th>Kiekis</th>
                  <th>Laisvos</th>
                  <th>Genre</th>
                  <th>About</th>
              </tr>
          </tfoot>
      </table>
  </div>
  {{--
  <div class="panel-body">
    <label class="col-sm-1 control-label" for="author">Users</label>
    <div class="col-sm-3">
      <select class="form-control" id="author" name="author">
        <option value="0">Select user</option>
        @if ($users->count())
          @foreach ($users as $user)
            <option value="{{ $user->id }}" @if (old('user') == $user->id) {{ 'selected="selected"' }} @endif >{{ $user->name }} {{ $user->last_name }}</option>
          @endforeach
        @endif
      </select>
    </div>
  </div>
  --}}
</div>



@endsection