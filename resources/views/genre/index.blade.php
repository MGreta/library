@extends('welcome')

@section('content')

@if($errors->any())
    <script>
        $(function() {
            $('#myModal{{session('wrong_genre_id')}}').modal('show');
        });
    </script>
@endif
<div class="">
@if (Auth::user())
    @if (Auth::user()->hasRole("admin"))
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Add Genre</div>
                <div class="panel-body">
                    <form class="form-inline" role="form" method="POST" action="{{ url('genres') }}">
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
    @endif
@endif
    
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
                                @if (Auth::user())
                                @if (Auth::user()->hasRole("admin"))
                                <th>Action</th>
                                @endif
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if ($genres->count())
                                @for ($i = 0; $i < count($genres); $i++)
                                    <tr>
                                        <th>{{ $i+1 }}</th>
                                            <td>{{ $genres[$i]->genre }}</td>
                                            @if (Auth::user())
                                            @if (Auth::user()->hasRole("admin"))
                                            <td>
                                                <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal{{ $genres[$i]->id }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                                <div class="modal fade" id="myModal{{ $genres[$i]->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="myModalLabel">{{$genres[$i]->genre}}</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                            @include ('partials.notice')
                                                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/genres/' . $genres[$i]->id . '/edit') }}">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <div class="form-group">
                                                                    <label class="col-sm-2 control-label" for="title">Genre</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" id="genre" name="genre" value="{{ old('genre', $genres[$i]->genre) }}">
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
                                                <!-- <a class="btn btn-default btn-xs" href="#" data-toggle="modal" data-target="#genres-delete-modal" data-genre-id="{{ $genres[$i]->id }}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a> -->
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
                                <th>Genre</th>
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

