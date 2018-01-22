@extends('welcome')

@section('content')
<div class="panel panel-primary">
  <div class="panel-heading">Pridėti knygą</div>
  <div class="panel-body">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('add-book') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

    	<div class="form-group">
        <label for="title" class="col-sm-1 control-label">Pavadinimas*</label>
    	  <div class="col-sm-11">
    	   	<input type="text" class="form-control" id="title" placeholder="Pavadinimas" name="title" value="{{ old('title') }}">
    	  </div>
      </div>
            
      <div class="form-group">
        <label class="col-sm-1 control-label" for="author">Autorius*</label>
         <div class="col-sm-5">
          <select class="form-control selectpicker" id="author" name="author[]" multiple>
            <option value="0">Pasirinkite autorių</option>
            <option value="other" @if (old('author') == 'other') {{ 'selected="selected"' }} @endif>Kitas</option>
            @if ($authors->count())
              @foreach ($authors as $author)
                <option value="{{ $author->id }}" @if (old('author') == $author->id) {{ 'selected="selected"' }} @endif >{{ $author->author_name }} {{ $author->author_surname }}</option>
              @endforeach
            @endif
          </select>
        </div>

        <label for="author-name" class="col-sm-1 control-label">Autorius</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="author_name" placeholder="Autorius atskirkite kableliu (,)" name="author_name" value="{{ old('author_name') }}">
        </div>
      </div>

    	<div class="form-group">
  	    <label for="isbn" class="col-sm-1 control-label">ISBN</label>
  	    <div class="col-sm-11">
  	    	<input type="text" class="form-control" id="isbn" placeholder="ISBN" name="isbn" value="{{ old('isbn') }}">
  	    </div>
    	</div>

    	<div class="form-group">
  	    <label for="date" class="col-sm-1 control-label">Data</label>
  	    <div class="col-sm-11">
  	    	<input type="text" class="form-control" id="date" placeholder="Data" name="date" value="{{ old('date') }}">
  	    </div>
    	</div>

    	<div class="form-group">
  	    <label for="size" class="col-sm-1 control-label">Dydis*</label>
  	    <div class="col-sm-11">
  	    	<input type="text" class="form-control" id="size" placeholder="Dydis" name="size" value="{{ old('size') }}">
  	    </div>
    	</div>
    	<div class="form-group">
        <label class="col-sm-1 control-label" for="language">Kalba*</label>
        <div class="col-sm-5">
          <select class="form-control" id="language" name="language">
            <option value="0">Pasirinkite kalbą</option>
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

        <label for="language" class="col-sm-1 control-label">Kalba</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="add_language" placeholder="Kalba" name="add_language" value="{{ old('add_language') }}" disabled>
        </div>
      </div>

    	<div class="form-group">
        <label class="col-sm-1 control-label" for="type">Tipas*</label>
        <div class="col-sm-5">
          <select class="form-control" id="type" name="type">
            <option value="0">Pasirinkite tipą</option>
            <option value="other" @if (old('type') == 'other') {{ 'selected="selected"' }} @endif>Kitas</option>
            @if ($types->count())
              @foreach ($types as $type)
                <option value="{{ $type->id }}" @if (old('type') == $type->id) {{ 'selected="selected"' }} @endif >{{ $type->type }}</option>
              @endforeach
            @endif
          </select>
        </div>

        <label for="type" class="col-sm-1 control-label">Tipas</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="add_type" placeholder="Tipas" name="add_type" value="{{ old('add_type') }}" disabled>
        </div>
      </div>

    	{{--<div class="form-group">
  	    <label for="udk" class="col-sm-1 control-label">UDK</label>
  	    <div class="col-sm-11">
  	    	<input type="text" class="form-control" id="udk" placeholder="UDK" name="udk" value="{{ old('udk') }}">
  	    </div>
    	</div>--}}

    	<div class="form-group">
  	    <label for="quantity" class="col-sm-1 control-label">Kiekis*</label>
  	    <div class="col-sm-11">
  	    	<input type="text" class="form-control" id="quantity" placeholder="Kiekis" name="quantity" value="{{ old('quantity') }}">
  	    </div>
    	</div>

      <div class="form-group">
        <label class="col-sm-1 control-label" for="publishing_house">Leidykla*</label>
        <div class="col-sm-5">
          <select class="form-control" id="publishing_house" name="publishing_house">
            <option value="0">Pasirinkite leidyklą</option>
            <option value="other" @if (old('publishing_house') == 'other') {{ 'selected="selected"' }} @endif>Kitas</option>
            @if ($publishing_houses->count())
                @foreach ($publishing_houses as $publishing_house)
                  <option value="{{ $publishing_house->id }}" @if (old('publishing_house') == $publishing_house->id) {{ 'selected="selected"' }} @endif >{{ $publishing_house->publishing_house }}</option>
                @endforeach
            @endif
        </select>
        </div>

        <label for="publishing-house" class="col-sm-1 control-label">Leidykla</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="add_publishing_house" placeholder="Leidykla" name="add_publishing_house" value="{{ old('add_publishing_house') }}" disabled>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-1 control-label" for="city">Miestas*</label>
        <div class="col-sm-5">
          <select class="form-control" id="city" name="city">
            <option value="0">Pasirinkite miestą</option>
            <option value="other" @if (old('city') == 'other') {{ 'selected="selected"' }} @endif>Kitas</option>
            @if ($cities->count())
              @foreach ($cities as $city)
                <option value="{{ $city->id }}" @if (old('city') == $city->id) {{ 'selected="selected"' }} @endif >{{ $city->city }}</option>
              @endforeach
            @endif
          </select>
        </div>

        <label for="city" class="col-sm-1 control-label">Miestas</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" id="add_city" placeholder="Miestas" name="add_city" value="{{ old('add_city') }}" disabled>
        </div>
      </div>

    	<div class="form-group">
  	    <label for="about" class="col-sm-1 control-label">Apie</label>
  	    <div class="col-sm-11">
  	    	<input type="text" class="form-control" id="about" placeholder="Apie" name="about" value="{{ old('about') }}">
  	    </div>
    	</div>

      <div class="form-group">
        <label for="about" class="col-sm-1 control-label">Žanras</label>
        <div class="col-sm-11">
          <select class="form-control" data-size="10" id="genre" name="genre">
            <option value="0">Romanai</option>
            @if ($genres->count())
              @foreach ($genres as $genre)
                <option value="{{ $genre->id }}" @if (old('genre') == $genre->id) {{ 'selected="selected"' }} @endif >{{ $genre->genre }}</option>
              @endforeach
            @endif
          </select>
        </div>
      </div>

      <div class="form-group">
        <label for="about" class="col-sm-1 control-label">Temos</label>
        <div class="col-sm-11">
          @foreach ($first_level_results as $first_level_result)
          <select class="form-control udk-select selectpicker" multiple data-max-options="1" data-live-search="true" data-size="10" name="{{ $first_level_result['id'] }}" title="{{ $first_level_result['title'] }}" style="color: #999999;">
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
        </div>
      </div>
      
    	<div class="form-group">
       	<div class="col-sm-offset-2 col-sm-10">
       		<button type="submit" name="create" value="create" class="btn btn-primary">Pridėti naują</button>
       	</div>
      </div>
    </form>
  </div>
</div>


<script>
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