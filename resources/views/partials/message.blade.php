@if (count($errors) > 0)
	<div class="container-fluid background">
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-dismissible alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
@endif

@if (session('status'))
	<div class="container-fluid background">
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-dismissible alert-success">
					{{ session('status') }}
				</div>
			</div>
		</div>
	</div>
@endif

@if (session('flash_message'))
	<div class="container-fluid background">
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-dismissible alert-info">
					{{ session('flash_message') }}
				</div>
			</div>
		</div>
	</div>
@endif
