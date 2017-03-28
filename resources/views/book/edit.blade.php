@extends('welcome')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Book</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/book/' . $book->id . '/edit') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-sm-2 control-label" for="title">Title</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="title" name="title" value="{{ old('title', $book->title) }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label" for="author">Author</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="author" name="author" value="{{ old('author', $book->author) }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label" for="isbn">Isbn</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="isbn" name="isbn" value="{{ old('isbn', $book->isbn) }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label" for="date">Date</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="date" name="date" value="{{ old('date', $book->date) }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label" for="size">Size</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="size" name="size" value="{{ $book->size }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label" for="language">Language</label>
							<div class="col-sm-10">
					            <select class="form-control" id="language" name="language">
					                <option value="{{ $book->language }}">{{ $language->language }}</option>
					                @if ($languages->count())
					                    @foreach ($languages as $language)
					                        <option value="{{ $language->id }}" @if (old('language') == $language->id) {{ 'selected="selected"' }} @endif >{{ $language->language }}</option>
					                    @endforeach
					                @endif
					            </select>
					            
					        </div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label" for="type">Type</label>
							<div class="col-sm-10">
					            <select class="form-control" id="type" name="type">
					                <option value="{{ $book->type }}">{{ $type->type }}</option>
					                @if ($types->count())
					                    @foreach ($types as $type)
					                        <option value="{{ $type->id }}" @if (old('type') == $type->id) {{ 'selected="selected"' }} @endif >{{ $type->type }}</option>
					                    @endforeach
					                @endif
					            </select>
					        </div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label" for="udk">Udk</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="udk" name="udk" value="{{ $book->udk }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label" for="quantity">Quantity</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="quantity" name="quantity" value="{{ $book->quantity }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label" for="publishing_house">Publishing house</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="publishing_house" name="publishing_house" value="{{ $book->publishing_house }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label" for="city">City</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="city" name="city" value="{{ $book->city }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label" for="genre">Genre</label>
							<div class="col-sm-10">
					            <select class="form-control" id="genre" name="genre">
					                <option value="{{ $book->genre }}">{{ $genre->genre }}</option>
					                @if ($genres->count())
					                    @foreach ($genres as $genre)
					                        <option value="{{ $genre->id }}" @if (old('genre') == $genre->id) {{ 'selected="selected"' }} @endif >{{ $genre->genre }}</option>
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
			</div>
		</div>
	</div>
</div>
@endsection
