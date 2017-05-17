@extends('layouts.admin')

@section('content')
<div class="panel panel-primary">
  <div class="panel-heading">Add User</div>
  <div class="panel-body">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/add-user') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="form-group">
          <label for="name" class="col-sm-2 control-label">Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="name" placeholder="name" name="name" value="{{ old('name') }}">
          </div>
        </div>
        <div class="form-group">
          <label for="last_name" class="col-sm-2 control-label">Last name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="last_name" placeholder="Last name" name="last_name" value="{{ old('last_name') }}">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label" for="role">Role</label>
          <div class="col-sm-10">
            <select class="form-control" id="role" name="role">
              <option value="0">Select a role</option>
                @if ($roles)
                  @for ($i = 0; $i < count($roles); $i++)
                      <option value="{{ $roles[$i]->id }}" @if (old('role') == $roles[$i]->id) {{ 'selected="selected"' }} @endif >{{ $roles[$i]->name }}</option>
                  @endfor
              @endif
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="class" class="col-sm-2 control-label">Class</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="class" placeholder="class" name="class" value="{{ old('class') }}">
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">email</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="email" placeholder="email" name="email" value="{{ old('email') }}">
          </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input id="password" type="password" class="form-control" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" name="create" value="create" class="btn btn-primary">Add new</button>
          </div>
        </div>
    </form>
  </div>
</div>



@endsection