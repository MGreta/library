@extends('welcome')

@section('content')

@if($errors->any())
    <script>
        $(function() {
            $('#userEdit{{session('wrong_id')}}').modal('show');
        });
    </script>
@endif
<div class="panel panel-primary">
    <div class="panel-heading">Users</div>
    <div class="panel-body">
        <table class="table table-striped table-hover table-condensed">
            <thead>
                <tr class="info">
                    <th>#</th>
                    <th><a href="{{ action('AdminController@orderByFirstName') }}">First Name</a></th>
                    <th><a href="{{ action('AdminController@orderByLastName') }}">Last Name</a></th>
                    <th><a href="{{ action('AdminController@orderByEmail') }}">Email</a></th>
                    <th><a href="{{ action('AdminController@orderByClass') }}">Class</a></th>
                    <th><a href="{{ action('AdminController@orderByRole') }}">Role</a></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($users->count())
                    @for ($i = 0; $i < count($users); $i++)
                        <tr>
                            <th>{{ $i+1 }}</th>
                                <td>{{ $users[$i]->name }}</td>
                                <td>{{ $users[$i]->last_name }}</td>
                                <td>{{ $users[$i]->email }}</td>
                                <td>{{ $users[$i]->class }}</td>
                                <td>@foreach ($users[$i]->roles()->pluck('name', 'slug') as $slug => $name)
                                        {{ $name }}
                                    @endforeach
                                </td>
                                <td>
                                    <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#userEdit{{ $users[$i]->id }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                    <div class="modal fade" id="userEdit{{ $users[$i]->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">{{$users[$i]->name}} {{$users[$i]->last_name}}</h4>
                                                </div>
                                                <div class="modal-body">
                                                @include ('partials.notice')
                                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/' . $users[$i]->id . '/edit') }}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="title">Name</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $users[$i]->name) }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="author">Last Name</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $users[$i]->last_name) }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="isbn">Class</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="class" name="class" value="{{ old('class', $users[$i]->class) }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="date">Email</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $users[$i]->email) }}">
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
                                    <!-- <a class="btn btn-default btn-xs" href="{{ url('/user/' . $users[$i]->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> -->
                                    <a class="btn btn-default btn-xs" href="#" data-toggle="modal" data-target="#users-delete-modal" data-users-email="{{ $users[$i]->email }}" data-users-id="{{ $users[$i]->id }}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Class</th>
                    <th>Roles</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>


@endsection