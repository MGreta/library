@extends('welcome')

@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{ $user->name }}</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/profile/edit') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-sm-2 control-label" for="title">Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label" for="author">Last Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}">
							</div>
						</div>

						<!-- <div class="form-group">
							<label class="col-sm-2 control-label" for="isbn">Class</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="class" name="class" value="{{ old('class', $user->class) }}">
							</div>
						</div> -->

						<div class="form-group">
							<label class="col-sm-2 control-label" for="date">Email</label>
							<div class="col-sm-10">
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

@endsection