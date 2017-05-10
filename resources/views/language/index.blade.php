@extends('welcome')

@section('content')

@if($errors->any())
    <script>
        $(function() {
            $('#languageEdit{{session('wrong_id')}}').modal('show');
        });
    </script>
@endif
<div class="">  
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Add Language</div>
                <div class="panel-body">
                    <form class="form-inline" role="form" method="POST" action="{{ url('/language') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <!-- <div class="form-group col-md-6">
                            <label class="col-md-4 control-label" for="language">Language</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="language" name="language" value="{{ old('language') }}">
                            </div>
                        </div> -->

                        <div class="input-group control-group after-add-more">
                            <input type="text" name="language[]" class="form-control" value="{{ old('language') }}">
                        </div>
                        <div class="input-group-btn"> 
                                <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
                        </div>
                        <!-- Copy Fields -->
                        <!-- <div class="copy hide">
                            <div class="control-group input-group" style="margin-top:10px">
                                <input type="text" name="language[]" class="form-control" value="{{ old('language') }}">
                                <div class="input-group-btn"> 
                                    <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                </div>
                            </div>
                        </div> -->

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
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Languages</div>
                <div class="panel-body">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr class="info">
                                <th>#</th>
                                <th><a href="{{ action('LanguageController@order') }}">Language</a></th>
                                @if (Auth::user())
                                    @if (Auth::user()->hasRole("admin"))
                                    <th>Action</th>
                                    @endif
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if ($languages->count())
                                @for ($i = 0; $i < count($languages); $i++)
                                    <tr>
                                        <th>{{ $i+1 }}</th>
                                            <td><a href="/language/{{ $languages[$i]->id }}/books">{{ $languages[$i]->language }}</a></td>
                                            @if (Auth::user())
                                                @if (Auth::user()->hasRole("admin"))
                                                <td>
                                                    <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#languageEdit{{ $languages[$i]->id }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                                    <div class="modal fade" id="languageEdit{{ $languages[$i]->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel">{{$languages[$i]->language}}</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                @include ('partials.notice')
                                                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/language/' . $languages[$i]->id . '/edit') }}">
                                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                                        <div class="form-group">
                                                                            <label class="col-sm-2 control-label" for="title">Language</label>
                                                                            <div class="col-sm-10">
                                                                                <input type="text" class="form-control" id="language" name="language" value="{{ old('language', $languages[$i]->language) }}">
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
                                                    <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#languages-delete-modal{{$languages[$i]->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                                    <div class="modal fade" id="languages-delete-modal{{$languages[$i]->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                                    <h4 class="modal-title">Delete language</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/language/' .$languages[$i]->id .'/delete') }}">
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <h5>Language</h5>
                                                                            </div>
                                                                            <div>
                                                                                <p>{{ $languages[$i]->language }}</p>
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
                                <th>Language</th>
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