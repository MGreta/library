@extends('welcome')

@section('content')
<div class="panel panel-primary">
  <div class="panel-heading">Add Book</div>
  <div class="panel-body">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/add-book') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    	<div class="form-group">
        <label for="title" class="col-sm-2 control-label">Title</label>
    	  <div class="col-sm-10">
    	   	<input type="text" class="form-control" id="title" placeholder="title" name="title" value="{{ old('title') }}">
    	  </div>
      </div>
    	<div class="form-group">
  	    <label for="author" class="col-sm-2 control-label">Author</label>
  	    <div class="col-sm-10">
  	    	<input type="text" class="form-control" id="author" placeholder="author" name="author" value="{{ old('author') }}">
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
                  <option value="0">Select a type</option>
                  @if ($types->count())
                      @foreach ($types as $type)
                          <option value="{{ $type->id }}" @if (old('type') == $type->id) {{ 'selected="selected"' }} @endif >{{ $type->type }}</option>
                      @endforeach
                  @endif
              </select>
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


@endsection