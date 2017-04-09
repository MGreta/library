@extends('welcome')

@section('content')
<div class="panel panel-primary">
  <div class="panel-heading">Add Book</div>
  <div class="panel-body">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('add-book') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    	<div class="form-group">
        <label for="title" class="col-sm-2 control-label">Title</label>
    	  <div class="col-sm-10">
    	   	<input type="text" class="form-control" id="title" placeholder="title" name="title" value="{{ old('title') }}">
    	  </div>
      </div>
      
      <div class="form-group">
          <label class="col-sm-2 control-label" for="author">Author</label>
          <div class="col-sm-10">
              <select class="form-control" id="author" name="author">
                  <option value="0">Select author</option>
                  <option value="other">Kitas</option>
                  @if ($authors->count())
                      @foreach ($authors as $author)
                          <option value="{{ $author->id }}" @if (old('author') == $author->id) {{ 'selected="selected"' }} @endif >{{ $author->author_name }} {{ $author->author_surname }}</option>
                      @endforeach
                  @endif
              </select>
          </div>
      </div>
    	<div class="form-group" id="create-book-authname" style="display: none;">
  	    <label for="author-name" class="col-sm-2 control-label">Author name</label>
  	    <div class="col-sm-10">
  	    	<input type="text" class="form-control" id="author_name" placeholder="author name" name="author_name" value="{{ old('author_name') }}">
  	    </div>
    	</div>
      <div class="form-group" id="create-book-authsurname" style="display: none;">
        <label for="author_surname" class="col-sm-2 control-label">Author surname</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="author_surnam" placeholder="author surname" name="author_surname" value="{{ old('author_surname') }}">
        </div>
      </div>
    	<div class="form-group">
  	    <label for="isbn" class="col-sm-2 control-label">ISBN</label>
  	    <div class="col-sm-10">
  	    	<input type="text" class="form-control" id="isbn" placeholder="isbn" name="isbn" value="{{ old('isbn') }}">
  	    </div>
    	</div>
    	<div class="form-group">
  	    <label for="date" class="col-sm-2 control-label">Date</label>
  	    <div class="col-sm-10">
  	    	<input type="text" class="form-control" id="date" placeholder="date" name="date" value="{{ old('date') }}">
  	    </div>
    	</div>
    	<div class="form-group">
  	    <label for="size" class="col-sm-2 control-label">Size</label>
  	    <div class="col-sm-10">
  	    	<input type="text" class="form-control" id="size" placeholder="size" name="size" value="{{ old('size') }}">
  	    </div>
    	</div>
    	<div class="form-group">
          <label class="col-sm-2 control-label" for="language">Language</label>
          <div class="col-sm-10">
              <select class="form-control" id="language" name="language">
                  <option value="0">Select a language</option>
                  <option value="other">Kitas</option>
                  @if ($languages->count())
                      @foreach ($languages as $language)
                          <option value="{{ $language->id }}" @if (old('language') == $language->id) {{ 'selected="selected"' }} @endif >{{ $language->language }}</option>
                      @endforeach
                  @endif
              </select>
          </div>
      </div>
      <div class="form-group" id="create-book-language" style="display: none;">
        <label for="language" class="col-sm-2 control-label">Language</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="add_language" placeholder="language" name="add_language" value="{{ old('language') }}">
        </div>
      </div>
    	<div class="form-group">
          <label class="col-sm-2 control-label" for="type">Type</label>
          <div class="col-sm-10">
              <select class="form-control" id="type" name="type">
                  <option value="0">Select a type</option>
                  @if ($types->count())
                      @foreach ($types as $type)
                          <option value="{{ $type->id }}" @if (old('type') == $type->id) {{ 'selected="selected"' }} @endif >{{ $type->type }}</option>
                      @endforeach
                  @endif
              </select>
          </div>
      </div>
      <div class="form-group" id="create-book-type" style="display: none;">
        <label for="type" class="col-sm-2 control-label">Type</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="add_type" placeholder="type" name="add_type" value="{{ old('type') }}">
        </div>
      </div>
    	<div class="form-group">
  	    <label for="udk" class="col-sm-2 control-label">udk</label>
  	    <div class="col-sm-10">
  	    	<input type="text" class="form-control" id="udk" placeholder="udk" name="udk" value="{{ old('udk') }}">
  	    </div>
    	</div>
    	<div class="form-group">
  	    <label for="quantity" class="col-sm-2 control-label">Kiekis</label>
  	    <div class="col-sm-10">
  	    	<input type="text" class="form-control" id="quantity" placeholder="quantity" name="quantity" value="{{ old('quantity') }}">
  	    </div>
    	</div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="publishing_house">Publishing house</label>
        <div class="col-sm-10">
          <select class="form-control" id="publishing_house" name="publishing_house">
            <option value="0">Select a publishing house</option>
            @if ($publishing_houses->count())
                @foreach ($publishing_houses as $publishing_house)
                    <option value="{{ $publishing_house->id }}" @if (old('publishing_house') == $publishing_house->id) {{ 'selected="selected"' }} @endif >{{ $publishing_house->publishing_house }}</option>
                @endforeach
            @endif
        </select>
        </div>
      </div>
      <div class="form-group" id="create-book-publishing-house" style="display: none;">
        <label for="publishing-house" class="col-sm-2 control-label">Publishing house</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="add_publishing_house" placeholder="publishing house" name="add_publishing_house" value="{{ old('publishing_house') }}">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="city">City</label>
        <div class="col-sm-10">
          <select class="form-control" id="publishing_house" name="publishing_house">
            <option value="0">Select a city</option>
            @if ($cities->count())
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}" @if (old('city') == $city->id) {{ 'selected="selected"' }} @endif >{{ $city->city }}</option>
                @endforeach
            @endif
        </select>
        </div>
      </div>
      <div class="form-group" id="create-book-city" style="display: none;">
        <label for="city" class="col-sm-2 control-label">City</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="add_city" placeholder="city" name="add_city" value="{{ old('city') }}">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label" for="genre">Genre</label>
        <div class="col-sm-10">
          <select class="form-control" id="genre" name="genre">
          <option value="0">Select a genre</option>
            @if ($genres->count())
              @foreach ($genres as $genre)
                <option value="{{ $genre->id }}" @if (old('genre') == $genre->id) {{ 'selected="selected"' }} @endif >{{ $genre->genre }}</option>
              @endforeach
            @endif
          </select>
        </div>
      </div>
      <div class="form-group" id="create-book-genre" style="display: none;">
        <label for="genre" class="col-sm-2 control-label">Genre</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="add_genre" placeholder="genre" name="add_genre" value="{{ old('genre') }}">
        </div>
      </div>
    	<div class="form-group">
  	    <label for="about" class="col-sm-2 control-label">About</label>
  	    <div class="col-sm-10">
  	    	<input type="text" class="form-control" id="about" placeholder="about" name="about" value="{{ old('about') }}">
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


<script>
  $('#author').on('change', function(){
    if($(this).val() == 'other'){
      $('#create-book-authname').css('display', 'block');
      $('#create-book-authsurname').css('display', 'block');
    }
  });
</script>

@endsection