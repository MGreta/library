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
                                                    <!-- <a class="btn btn-default btn-xs" href="{{ url('/language/' . $languages[$i]->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> -->
                                                    <a class="btn btn-default btn-xs" href="#" data-toggle="modal" data-target="#languages-delete-modal" data-languages="{{ $languages[$i]->language }}" data-languages-id="{{ $languages[$i]->id }}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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