@extends('welcome')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Language</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/language/' . $language->id . '/edit') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-sm-2 control-label" for="title">Language</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="language" name="language" value="{{ old('language', $language->language) }}">
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
