@extends('layouts.admin')

@section('content')


<div class="">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Add Genre</div>
                <div class="panel-body">
                    <form class="form-inline" role="form" method="POST" action="{{ url('admin/genres') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group col-md-6">
                            <label class="col-md-4 control-label" for="genre">Genre</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="genre" name="genre" value="{{ old('genre') }}">
                            </div>
                        </div>
                        <button type="submit" name="create" value="create" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Genres</div>
                <div class="panel-body">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr class="info">
                                <th>#</th>
                                <th><a href="{{ action('GenresController@order') }}">Genre</a></th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($genres->count())
                                @for ($i = 0; $i < count($genres); $i++)
                                    <tr>
                                        <th>{{ $i+1 }}</th>
                                            <td>{{ $genres[$i]->genre }}</td>
                                            <td>
                                                <a class="btn btn-default btn-xs" href="{{ url('/genre/' . $genres[$i]->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                                <a class="btn btn-default btn-xs" href="#" data-toggle="modal" data-target="#genres-delete-modal" data-genre-id="{{ $genres[$i]->id }}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                            </td>
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
                                <th>Genre</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection