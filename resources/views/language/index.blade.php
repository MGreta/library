@extends('welcome')

@section('content')


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
                                                    <a class="btn btn-default btn-xs" href="{{ url('/language/' . $languages[$i]->id . '/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
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