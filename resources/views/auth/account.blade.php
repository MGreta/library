{{--
@extends('layouts.default')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-3">
                        <h2>Mano Paskyra</h2>
                    </div>
                    <div class="col-md-9">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/profile/') }}">
                        {{method_field('PATCH')}}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="name">First Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="last_name">Last Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}">
                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <label class="col-md-4 control-label" for="last_name">Class</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="class" name="class" value="{{ old('class', $user->class) }}">
                                </div>
                            </div> -->

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email">Class</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
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
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
--}}