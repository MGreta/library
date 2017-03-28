@extends('welcome')

@section('content')


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
                                            <td>{{ get_books_by_publishing_house($publishing_house[$i]->id) }}</td>
                                            @if (Auth::user())
                                            @if (Auth::user()->hasRole("admin"))
                                            <td>
                                                <a class="btn btn-default btn-xs" href="{{ url('/publishing-house/' . $publishing_house[$i]->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                                <a class="btn btn-default btn-xs" href="#" data-toggle="modal" data-target="#languages-delete-modal" data-languages="{{ $types[$i]->type }}" data-languages-id="{{ $types[$i]->id }}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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