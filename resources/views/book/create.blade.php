@extends('welcome')

@section('content')
<div class="panel panel-primary">
  <div class="panel-heading">Add Book</div>
  <div class="panel-body">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('add-book') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    	<div class="form-group">
        <label for="title" class="col-sm-1 control-label">Title</label>
    	  <div class="col-sm-11">
    	   	<input type="text" class="form-control" id="title" placeholder="title" name="title" value="{{ old('title') }}">
    	  </div>
      </div>
            
      <div class="form-group">
        <label class="col-sm-1 control-label" for="author">Author</label>
         <div class="col-sm-3">
          <select class="form-control" id="author" name="author">
            <option value="0">Select author</option>
            <option value="other" @if (old('author') == 'other') {{ 'selected="selected"' }} @endif>Kitas</option>
            @if ($authors->count())
              @foreach ($authors as $author)
                <option value="{{ $author->id }}" @if (old('author') == $author->id) {{ 'selected="selected"' }} @endif >{{ $author->author_name }} {{ $author->author_surname }}</option>
              @endforeach
            @endif
          </select>
        </div>

        <label for="author-name" class="col-sm-1 control-label">Author name</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="author_name" placeholder="author name" name="author_name" value="{{ old('author_name') }}" disabled>
        </div>

        <label for="author_surname" class="col-sm-1 control-label">Author surname</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="author_surname" placeholder="author surname" name="author_surname" value="{{ old('author_surname') }}" disabled>
        </div>
      </div>
    	<!-- <div class="form-group" id="create-book-authname" style="display: none;">
  	    
    	</div>
      <div class="form-group" id="create-book-authsurname" style="display: none;">
        
      </div> -->
    	<div class="form-group">
  	    <label for="isbn" class="col-sm-1 control-label">ISBN</label>
  	    <div class="col-sm-11">
  	    	<input type="text" class="form-control" id="isbn" placeholder="isbn" name="isbn" value="{{ old('isbn') }}">
  	    </div>
    	</div>
    	<div class="form-group">
  	    <label for="date" class="col-sm-1 control-label">Date</label>
  	    <div class="col-sm-11">
  	    	<input type="text" class="form-control" id="date" placeholder="date" name="date" value="{{ old('date') }}">
  	    </div>
    	</div>
    	<div class="form-group">
  	    <label for="size" class="col-sm-1 control-label">Size</label>
  	    <div class="col-sm-11">
  	    	<input type="text" class="form-control" id="size" placeholder="size" name="size" value="{{ old('size') }}">
  	    </div>
    	</div>
    	<div class="form-group">
        <label class="col-sm-1 control-label" for="language">Language</label>
        <div class="col-sm-5">
          <select class="form-control" id="language" name="language">
            <option value="0">Select a language</option>
            <option value="other" @if (old('language') == 'other') {{ 'selected="selected"' }} @endif>Kitas</option>
            @if ($languages->count())
              @foreach ($languages as $language)
                <option value="{{ $language->id }}" @if (old('language') == $language->id) {{ 'selected="selected"' }} @endif >
                  {{ $language->language }}
                </option>
              @endforeach
            @endif
          </select>
        </div>

        <label for="language" class="col-sm-1 control-label">Language</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="add_language" placeholder="language" name="add_language" value="{{ old('add_language') }}" disabled>
        </div>
      </div>
      <!-- <div class="form-group" id="create-book-language" style="display: none;">
        
      </div> -->
    	<div class="form-group">
        <label class="col-sm-1 control-label" for="type">Type</label>
        <div class="col-sm-5">
          <select class="form-control" id="type" name="type">
            <option value="0">Select a type</option>
            <option value="other" @if (old('type') == 'other') {{ 'selected="selected"' }} @endif>Kitas</option>
            @if ($types->count())
              @foreach ($types as $type)
                <option value="{{ $type->id }}" @if (old('type') == $type->id) {{ 'selected="selected"' }} @endif >{{ $type->type }}</option>
              @endforeach
            @endif
          </select>
        </div>

        <label for="type" class="col-sm-1 control-label">Type</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="add_type" placeholder="type" name="add_type" value="{{ old('add_type') }}" disabled>
        </div>
      </div>
      <!-- <div class="form-group" id="create-book-type" style="display: none;">
        
      </div> -->
    	<div class="form-group">
  	    <label for="udk" class="col-sm-1 control-label">udk</label>
  	    <div class="col-sm-11">
  	    	<input type="text" class="form-control" id="udk" placeholder="udk" name="udk" value="{{ old('udk') }}">
  	    </div>
    	</div>
    	<div class="form-group">
  	    <label for="quantity" class="col-sm-1 control-label">Kiekis</label>
  	    <div class="col-sm-11">
  	    	<input type="text" class="form-control" id="quantity" placeholder="quantity" name="quantity" value="{{ old('quantity') }}">
  	    </div>
    	</div>
      <div class="form-group">
        <label class="col-sm-1 control-label" for="publishing_house">Publishing house</label>
        <div class="col-sm-5">
          <select class="form-control" id="publishing_house" name="publishing_house">
            <option value="0">Select a publishing house</option>
            <option value="other" @if (old('publishing_house') == 'other') {{ 'selected="selected"' }} @endif>Kitas</option>
            @if ($publishing_houses->count())
                @foreach ($publishing_houses as $publishing_house)
                  <option value="{{ $publishing_house->id }}" @if (old('publishing_house') == $publishing_house->id) {{ 'selected="selected"' }} @endif >{{ $publishing_house->publishing_house }}</option>
                @endforeach
            @endif
        </select>
        </div>

        <label for="publishing-house" class="col-sm-1 control-label">Publishing house</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="add_publishing_house" placeholder="publishing house" name="add_publishing_house" value="{{ old('add_publishing_house') }}" disabled>
        </div>
      </div>
      <!-- <div class="form-group" id="create-book-publishing-house" style="display: none;">
        
      </div> -->
      <div class="form-group">
        <label class="col-sm-1 control-label" for="city">City</label>
        <div class="col-sm-5">
          <select class="form-control" id="city" name="city">
            <option value="0">Select a city</option>
            <option value="other" @if (old('city') == 'other') {{ 'selected="selected"' }} @endif>Kitas</option>
            @if ($cities->count())
              @foreach ($cities as $city)
                <option value="{{ $city->id }}" @if (old('city') == $city->id) {{ 'selected="selected"' }} @endif >{{ $city->city }}</option>
              @endforeach
            @endif
          </select>
        </div>

        <label for="city" class="col-sm-1 control-label">City</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="add_city" placeholder="city" name="add_city" value="{{ old('add_city') }}" disabled>
        </div>
      </div>
      <!-- <div class="form-group" id="create-book-city" style="display: none;">
        
      </div> -->
      <!-- <div class="form-group">
        <label class="col-sm-1 control-label" for="genre">Genre</label>
        <div class="col-sm-5">
          <select class="form-control" id="genre" name="genre">
          <option value="0">Select a genre</option>
          <option value="other" @if (old('genre') == 'other') {{ 'selected="selected"' }} @endif>Kitas</option>
            @if ($genres->count())
              @foreach ($genres as $genre)
                <option value="{{ $genre->id }}" @if (old('genre') == $genre->id) {{ 'selected="selected"' }} @endif >{{ $genre->genre }}</option>
              @endforeach
            @endif
          </select>
        </div>

        <label for="genre" class="col-sm-1 control-label">Genre</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="add_genre" placeholder="genre" name="add_genre" value="{{ old('add_genre') }}" disabled>
        </div>
      </div> -->
      <!-- <div class="form-group" id="create-book-genre" style="display: none;">
        
      </div> -->
    	<div class="form-group">
  	    <label for="about" class="col-sm-1 control-label">About</label>
  	    <div class="col-sm-11">
  	    	<input type="text" class="form-control" id="about" placeholder="about" name="about" value="{{ old('about') }}">
  	    </div>
    	</div>


      @foreach ($first_level_results as $first_level_result)
      <select class="form-control udk-select" name="{{ $first_level_result['id'] }}" title="{{ $first_level_result['title'] }}" style="color: #999999;">
        <ul>
        <option class="first-level" style="color: #999999;" value="not-selected"> {{ $first_level_result['title'] }} </option>
        <option class="first-level" style="font-size: 16px; font-weight: 600; color: #000;" value="{{ $first_level_result['title'] }}"> {{ $first_level_result['title'] }} </option>
        @foreach ($second_level_results as $second_level_result)
          @if ($first_level_result['id'] == $second_level_result['first_level_id'])
            <option class="second-level" style="font-size: 14px; font-weight: 500; color: #000;" value="{{ $second_level_result['code'] }}"> {{ $second_level_result['title'] }} </option>
            <ul>
            @foreach ($third_level_results as $third_level_result)
              @if ($first_level_result['id'] == $second_level_result['first_level_id'] && $first_level_result['id'] == $third_level_result['first_level_id'] && $second_level_result['id'] == $third_level_result['second_level_id'])
                <option class="third-level" style="font-size: 12px; font-weight: 300; color: #000;" value="{{ $third_level_result['code'] }}">{{ $third_level_result['title'] }} </option>
              @endif
            @endforeach
            </ul>
          @endif
        @endforeach
        </ul>
      </select>
      @endforeach
      <select class="form-control" id="genre" name="genre">
        <option value="0">Romanai</option>
          @if ($genres->count())
            @foreach ($genres as $genre)
              <option value="{{ $genre->id }}" @if (old('genre') == $genre->id) {{ 'selected="selected"' }} @endif >{{ $genre->genre }}</option>
            @endforeach
          @endif
      </select>
      

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
      $('#author_name').prop("disabled", false);
      $('#author_surname').prop("disabled", false);
    }
  });
  if($('#author').val() == 'other'){
    $('#author_name').prop("disabled", false);
    $('#author_surname').prop("disabled", false);
  };

  $('#language').on('change', function(){
    if($(this).val() == 'other'){
      $('#add_language').prop("disabled", false);
    }
  });
  $('#language').on('change', function(){
    if($(this).val() !== 'other'){
      $('#add_language').prop("disabled", true);
      $('#add_language').val('');
    }
  });
  if($('#language').val() == 'other'){
    $('#add_language').prop("disabled", false);
  };

  $('#type').on('change', function(){
    if($(this).val() == 'other'){
      $('#add_type').prop("disabled", false);
    }
  });
  if($('#type').val() == 'other'){
    $('#add_type').prop("disabled", false);
  };

  $('#publishing_house').on('change', function(){
    if($(this).val() == 'other'){
      $('#add_publishing_house').prop("disabled", false);
    }
  });
  if($('#publishing_house').val() == 'other'){
    $('#add_publishing_house').prop("disabled", false);
  };

  $('#city').on('change', function(){
    if($(this).val() == 'other'){
      $('#add_city').prop("disabled", false);
    }
  });
  if($('#city').val() == 'other'){
    $('#add_city').prop("disabled", false);
  };

  $('#genre').on('change', function(){
    if($(this).val() == 'other'){
      $('#add_genre').prop("disabled", false);
    }
  });
  if($('#genre').val() == 'other'){
    $('#add_genre').prop("disabled", false);
  };

</script>

@endsection