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
                        <!-- <div class="form-group col-md-6">
                            <label class="col-md-4 control-label" for="genre_input">Genre</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="genre_input" name="genre_input" value="{{ old('genre_input') }}">
                            </div>
                        </div> -->
                        <div class="input-group control-group after-add-more">
                            <input type="text" name="genre_input[]" class="form-control" value="{{ old('genre_input') }}">
                        </div>
                        <div class="input-group-btn"> 
                                <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                        </div>
                        <script type="text/javascript">

                            $(document).ready(function() {
                                $(".add-more").click(function(){ 
                                    var html = $(".after-add-more").html();
                                    $(".after-add-more").after(html);
                                });

                                $("body").on("click",".remove",function(){ 
                                    $(this).parents(".control-group").remove();
                                });
                            });

                        </script>
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
                                                <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#genres-delete-modal{{$genres[$i]->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                                <div class="modal fade" id="genres-delete-modal{{$genres[$i]->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                                <h4 class="modal-title">Delete genre</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/genres/' .$genres[$i]->id .'/delete') }}">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <h5>Genre</h5>
                                                                        </div>
                                                                        <div>
                                                                            <p>{{ $genres[$i]->genre }}</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <h4>Ar tikrai norite istrinti?</h4>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <button type="submit" class="btn btn-danger" onclick="$(this).closest('.modal').find('form').submit();">Delete</button>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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

