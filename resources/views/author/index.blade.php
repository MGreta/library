@extends('welcome')


@section('content')

@if($errors->any())
    <script>
        $(function() {
            $('#authorEdit{{session('wrong_id')}}').modal('show');
        });
    </script>
    {{session('wrong_id')}}
@endif

@if (Auth::user())
    @if (Auth::user()->hasRole("admin"))
    <div class="panel panel-primary">
        <div class="panel-heading">Add authors</div>
        <div class="panel-body">
            <form role="form" method="POST" action="{{ url('authors') }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label class="col-md-2 col-sm-4 control-label" for="title">Name</label>
                    <div class="col-md-10 col-sm-8">
                        <input type="text" class="form-control" id="author_name" name="author_name" value="{{ old('author_name') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-sm-4 control-label" for="country">Country</label>
                    <div class="col-md-10 col-sm-8">
                        <input type="text" class="form-control" id="country" name="country" value="{{ old('country') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-sm-4 control-label" for="birth_date">Birth date</label>
                    <div class="col-md-10 col-sm-8">
                        <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-sm-4 control-label" for="death_date">Death date</label>
                    <div class="col-md-10 col-sm-8">
                        <input type="text" class="form-control" id="death_date" name="death_date" value="{{ old('death_date') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-sm-4 control-label" for="image">Image</label>
                    <div class="col-md-10 col-sm-8">
                        <input type="file" id="image" name="image" value="{{ old('image') }}">
                    </div>
                </div>
                <button type="submit" name="create" value="create" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
    @endif
@endif
    <div class="panel panel-primary">
        <div class="panel-heading">Authors</div>
        <div class="panel-body">
            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr class="info">
                        <th>#</th>
                        <th>Image</th>
                        <th><a href="{{ action('AuthorController@orderByName') }}">Name</a></th>
                        <th>Books</th>
                        <th>Kiek kartu autoriaus knygos buvo paimtos</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($authors->count())
                        @for ($i = 0; $i < count($authors); $i++)
                            <tr>
                                <th>{{ $i+1 }}</th>
                                    <td><img src="{{ URL::to('/') }}/authorsimages/{{ $authors[$i]->image }}" style="height: 50px; width: 50px;">
                                    </td>
                                    <td><a href="/author/{{ $authors[$i]->id }}/books">{{ $authors[$i]->author_name }}</a></td>
                                    <td>{{ get_books_by_authors($authors[$i]->id) }}</td>
                                    <td> {{ count_author_taken_times($authors[$i]->id) }} </td>
                                    <td>
                                        <a class="btn btn-default btn-xs"  data-toggle="modal" data-target="#authorEdit{{ $authors[$i]->id }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                        <div class="modal fade" id="authorEdit{{ $authors[$i]->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">{{$authors[$i]->author_name}} {{ $authors[$i]->author_surname }}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                    @include ('partials.notice')
                                                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/author/' . $authors[$i]->id . '/edit') }}">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label" for="title">Name</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="author_name" name="author_name" value="{{ old('author_name', $authors[$i]->author_name) }}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label" for="author">Surname</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="author_surname" name="author_surname" value="{{ old('author_surname', $authors[$i]->author_surname) }}">
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
                                        <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#authors-delete-modal{{$authors[$i]->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                        <div class="modal fade" id="authors-delete-modal{{$authors[$i]->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                        <h4 class="modal-title">Delete author</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/authors/' .$authors[$i]->id .'/delete') }}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <h5>Author name</h5>
                                                                </div>
                                                                <div>
                                                                    <p>{{ $authors[$i]->author_name }} {{ $authors[$i]->author_surname }}</p>
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
                                    </td>
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
                        <th>Name</th>
                        <th>Books</th>
                        <th>Kiek kartu autoriaus knygos buvo paimtos</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>



@endsection