@extends('welcome')

@section('content')
@include ('partials.notice')
<div class="panel panel-primary">
  <div class="panel-heading">Debt price</div>
  <div class="panel-body">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('options/debt-price') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

    	<div class="form-group">
        <label for="title" class="col-sm-2 control-label">Price per day</label>
    	  <div class="col-sm-10">
    	   	<input type="text" class="form-control" id="debt_price" placeholder="{{ get_price() }}" name="debt_price" value="{{ get_price() }}">
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

<div class="panel panel-primary">
  <div class="panel-heading">Days to have book</div>
  <div class="panel-body">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('options/days-to-have-book') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="form-group">
        <label for="title" class="col-sm-2 control-label">Days user can have books</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="days_to_have_book" placeholder="0" name="days_to_have_book" value="{{ get_days_to_have_book() }}">
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