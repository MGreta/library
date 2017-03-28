@extends('layouts.admin')

@section('content')



    <div class="panel panel-primary">
        <div class="panel-heading">Add authors</div>
        <div class="panel-body">
            <form class="form-inline" role="form" method="POST" action="{{ url('admin/authors') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="title">Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="author_name" name="author_name" value="{{ old('author_name') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="author">Surname</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="author_surname" name="author_surname" value="{{ old('author_surname') }}">
                    </div>
                </div>
                <button type="submit" name="create" value="create" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">Authors</div>
        <div class="panel-body">
            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr class="info">
                        <th>#</th>
                        <th><a href="{{ action('AuthorController@orderByName') }}">Name</a></th>
                        <th><a href="{{ action('AuthorController@orderBySurname') }}">Surname</a></th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($authors->count())
                        @for ($i = 0; $i < count($authors); $i++)
                            <tr>
                                <th>{{ $i+1 }}</th>
                                    <td>{{ $authors[$i]->author_name }}</td>
                                    <td>{{ $authors[$i]->author_surname }}</td>
                                    <td>
                                        <a class="btn btn-default btn-xs" href="{{ url('/author/' . $authors[$i]->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                        <a class="btn btn-default btn-xs" href="#" data-toggle="modal" data-target="#authors-delete-modal" data-authors-id="{{ $authors[$i]->id }}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>



@endsection