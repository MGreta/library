@extends('welcome')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Redaguoti knygą</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/book/' . $book->id . '/edit') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
                            <label class="col-sm-2 control-label" for="title">Pavadinimas</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $book->title) }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="author">Autorius</label>
                            <div class="col-sm-10">
                                <select class="form-control selectpicker" id="author" name="author[]" multiple>
                                    <option value="0">Pasirinkti autorių</option>
                                    @if ($authors->count())
                                        @foreach ($authors as $author)
                                            <option value="{{ $author->id }}" @foreach ($book_authors as $book_author) @if ($book_author->author_id == $author->id) {{ 'selected="selected"' }} @endif @endforeach>{{ $author->author_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="isbn">ISBN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="isbn" name="isbn" value="{{ old('isbn', $book->isbn) }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="isbn">UDK</label>
                            <div class="col-sm-10">
			                    <p>{{ $book->udk }}</p>
			                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="date">Data</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="date" name="date" value="{{ old('date', $book->date) }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="size">Dydis</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="size" name="size" value="{{ $book->size }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="language">Kalba</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="language" name="language">
                                    @if ($languages->count())
                                      @foreach ($languages as $language)
                                        <option value="{{ $language->id }}" @if ($book->language == $language->language) {{ 'selected="selected"' }} @endif > 
                                            {{ $language->language }}
                                        </option>
                                      @endforeach
                                    @endif
                                </select>                                                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="type">Tipas</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="type" name="type">
                                    <option value="{{ $book->type }}">{{ get_type($book->type) }}</option>
                                    @if (get_all_types($book->type)->count())
                                        @foreach (get_all_types($book->type) as $type)
                                            <option value="{{ $type->id }}" @if (old('type') == $type->id) {{ 'selected="selected"' }} @endif >{{ $type->type }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="quantity">Kiekis</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="quantity" name="quantity" value="{{ $book->quantity }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="publishing_house">Leidykla</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="publishing_house" name="publishing_house">
                                    <option value="0">Pasirinkite leidyklą</option>
                                    @if ($publishing_houses->count())
                                        @foreach ($publishing_houses as $publishing_house)
                                            <option value="{{ $publishing_house->id }}" @if ($book->publishing_house == $publishing_house->id) {{ 'selected="selected"' }} @endif >{{ $publishing_house->publishing_house }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="city">Miestas</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="city" name="city">
                                    <option value="0">Pasirinkite miestą</option>
                                    @if ($cities->count())
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}" @if ($book->city == $city->id) {{ 'selected="selected"' }} @endif >{{ $city->city }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="genre">Žanras</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="genre" name="genre">
                                    <option value="{{ $book->genre }}">{{ get_genre($book->genre) }}</option>
                                    @if (get_all_genres($book->genre)->count())
                                        @foreach (get_all_genres($book->genre) as $genre)
                                            <option value="{{ $genre->id }}" @if (old('genre') == $genre->id) {{ 'selected="selected"' }} @endif >{{ $genre->genre }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        @foreach ($first_level_results as $first_level_result)
                            <select class="form-control udk-select" name="{{ $first_level_result['id'] }}" title="{{ $first_level_result['title'] }}" style="color: #999999;">
                                <ul>
                                    <option class="first-level" style="color: #999999;" value="not-selected"> {{ $first_level_result['title'] }} </option>
                                    <option class="first-level" style="font-size: 16px; font-weight: 600; color: #000;" value="{{ $first_level_result['title'] }}" @foreach ($udk_codes as $code) @if ($code->udk == $first_level_result['code']) {{ 'selected="selected"' }} @endif @endforeach > {{ $first_level_result['title'] }} </option>
                                    @foreach ($second_level_results as $second_level_result)
                                        @if ($first_level_result['id'] == $second_level_result['first_level_id'])
                                        <option class="second-level" style="font-size: 14px; font-weight: 500; color: #000;" value="{{ $second_level_result['code'] }}" @foreach ($udk_codes as $code) @if ($code->udk == $second_level_result['code']) {{ 'selected="selected"' }} @endif @endforeach > {{ $second_level_result['title'] }} </option>
                                            <ul>
                                            @foreach ($third_level_results as $third_level_result)
                                                @if ($first_level_result['id'] == $second_level_result['first_level_id'] && $first_level_result['id'] == $third_level_result['first_level_id'] && $second_level_result['id'] == $third_level_result['second_level_id'])
                                                <option class="third-level" style="font-size: 12px; font-weight: 300; color: #000;" value="{{ $third_level_result['code'] }}" @foreach ($udk_codes as $code) @if ($code->udk == $third_level_result['code']) {{ 'selected="selected"' }} @endif @endforeach >{{ $third_level_result['title'] }} </option>
                                                @endif
                                            @endforeach
                                            </ul>
                                        @endif
                                    @endforeach
                                </ul>
                            </select>
                        @endforeach
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Išsaugoti pakeitimus
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



{{--
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
--}}