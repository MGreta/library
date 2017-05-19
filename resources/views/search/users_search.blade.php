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
    <div class="panel-heading">Books</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="GET" action="{{ url('/users-search') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-6">
                <input type="text" class="form-control" id="search" name="search"></input>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    </div>
</div>

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
                    <th><a href="{{ action('AdminController@orderByRole') }}">Role</a></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($users->count())
                    @for ($i = 0; $i < count($users); $i++)
                        <tr>
                            <th>{{ $i+1 }}</th>
                                <td><a href="{{ url('/about-user/' . $users[$i]->id ) }}">{{ $users[$i]->name }}</a></td>
                                <td><a href="{{ url('/about-user/' . $users[$i]->id ) }}">{{ $users[$i]->last_name }}</a></td>
                                <td>{{ $users[$i]->email }}</td>
                                <!-- <td>{{ $users[$i]->class }}</td> -->
                                <td>@foreach ($users[$i]->roles()->pluck('name', 'slug') as $slug => $role_name)
                                        {{ $role_name }}
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
                                                            <label class="col-sm-2 control-label" for="first_name">Name</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $users[$i]->name) }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="last_name">Last Name</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $users[$i]->last_name) }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="class">Class</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="class" name="class" value="{{ old('class', $users[$i]->class) }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="email">Email</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $users[$i]->email) }}">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label" for="role">Role</label>
                                                            <div class="col-sm-10">
                                                                <select class="form-control" id="role" name="role">
                                                                    @if ($roles->count())
                                                                        @foreach ($roles as $role)
                                                                            <option value="{{ $role->id }}" @if ($role_name == $role->name) {{ 'selected="selected"' }} @endif >{{ $role->name }}</option>
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
                                    <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#users-delete-modal{{$users[$i]->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                    <div class="modal fade" id="users-delete-modal{{$users[$i]->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                    <h4 class="modal-title">Delete user</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/all-users/' .$users[$i]->id .'/delete') }}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <h5>User name</h5>
                                                            </div>
                                                            <div>
                                                                <p>{{ $users[$i]->name }} {{ $users[$i]->last_name }}</p>
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
                    <th>Roles</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>


@endsection