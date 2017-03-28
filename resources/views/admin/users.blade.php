@extends('layouts.admin')

@section('content')


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
                                    <a class="btn btn-default btn-xs" href="{{ url('/user/' . $users[$i]->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
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