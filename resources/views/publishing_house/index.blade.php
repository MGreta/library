@extends('welcome')

@section('content')

@if($errors->any())
    <script>
        $(function() {
            $('#houseEdit{{session('wrong_id')}}').modal('show');
        });
    </script>
@endif
<div class="">
@if (Auth::user())
    @if (Auth::user()->hasRole("admin"))
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Add Publishing House</div>
                <div class="panel-body">
                    <form class="form-inline" role="form" method="POST" action="{{ url('publishing-house') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label" for="publishing_house">Publishing House</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="publishing_house" name="publishing_house" value="{{ old('publishing_house') }}">
                            </div>
                        </div>
                            <button type="submit" name="create" value="create" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
@endif
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Publishing House</div>
                <div class="panel-body">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr class="info">
                                <th>#</th>
                                <th><a href="{{ action('PublishingHouseController@order') }}">Publishing House</a></th>
                                <th>Books</th>
                                @if (Auth::user())
                                @if (Auth::user()->hasRole("admin"))
                                <th>Action</th>
                                @endif
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if ($publishing_house->count())
                                @for ($i = 0; $i < count($publishing_house); $i++)
                                    <tr>
                                        <th>{{ $i+1 }}</th>
                                            <td>{{ $publishing_house[$i]->publishing_house }}</td>
                                            <td>{{-- get_books_by_publishing_house($publishing_house[$i]->id) --}}</td>
                                            @if (Auth::user())
                                            @if (Auth::user()->hasRole("admin"))
                                            <td>
                                                <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#houseEdit{{ $publishing_house[$i]->id }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                                <div class="modal fade" id="houseEdit{{ $publishing_house[$i]->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="myModalLabel">{{$publishing_house[$i]->publishing_house}}</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                            @include ('partials.notice')
                                                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/publishing-house/' . $publishing_house[$i]->id . '/edit') }}">
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                                    <div class="form-group">
                                                                        <label class="col-sm-2 control-label" for="publishing_house">Publishing House</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control" id="publishing_house" name="publishing_house" value="{{ old('publishing_house', $publishing_house[$i]->publishing_house) }}">
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
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <a class="btn btn-default btn-xs" href="{{ url('/publishing-house/' . $publishing_house[$i]->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> -->
                                                <a class="btn btn-default btn-xs" href="{{ url('/publishing-house/' . $publishing_house[$i]->id . '/destroy') }}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                            </td>
                                            @endif
                                            @endif
                                    </tr>
                                @endfor
                            @else
                                <tr>
                                    <td class="text-center" colspan="8">List Is Empty.</td>
                                </tr>
                            @endif
                        </tbody>                        
                        <tfoot>
                            <tr class="info">
                                <th>#</th>
                                <th>Publishing House</th>
                                <th>Books</th>
                                @if (Auth::user())
                                @if (Auth::user()->hasRole("admin"))
                                <th>Action</th>
                                @endif
                                @endif
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection