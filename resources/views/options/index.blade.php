@extends('welcome')

@section('content')
<div class="panel panel-primary">
  <div class="panel-heading">Debt price</div>
  <div class="panel-body">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('options/debt-price') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    	<div class="form-group">
        <label for="title" class="col-sm-2 control-label">Price per day</label>
    	  <div class="col-sm-10">
    	   	<input type="text" class="form-control" id="price" placeholder="price" name="price" value="{{ old('price') }}">
    	  </div>
      </div>
    	<div class="form-group">
       	<div class="col-sm-offset-2 col-sm-10">
       		<button type="submit" name="create" value="create" class="btn btn-primary">Save</button>
       	</div>
      </div>
    </form>
  </div>
</div>


@endsection