@extends('welcome')


@section('content')

@if($errors->any())
    <script>
        $(function() {
            $('#authorEdit{{session('wrong_id')}}').modal('show');
        });
    </script>
    {{session('wrong_id')}}
@endif

@if (Auth::user())
    @if (Auth::user()->hasRole("admin"))
    <div class="panel panel-primary">
        <div class="panel-heading">Pridėti naują autorių</div>
        <div class="panel-body">
            <form role="form" method="POST" action="{{ url('authors') }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label class="col-md-2 col-sm-4 control-label" for="title">Vardas pavardė</label>
                    <div class="col-md-10 col-sm-8">
                        <input type="text" class="form-control" id="author_name" name="author_name" value="{{ old('author_name') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-sm-4 control-label" for="country">Šalis</label>
                    <div class="col-md-10 col-sm-8">
                        <input type="text" class="form-control" id="country" name="country" value="{{ old('country') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-sm-4 control-label" for="birth_date">Gimimo data</label>
                    <div class="col-md-10 col-sm-8">
                        <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-sm-4 control-label" for="death_date">Mirties data</label>
                    <div class="col-md-10 col-sm-8">
                        <input type="text" class="form-control" id="death_date" name="death_date" value="{{ old('death_date') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 col-sm-4 control-label" for="image">Nuotrauka</label>
                    <div class="col-md-10 col-sm-8">
                        <input type="file" id="image" name="image" value="{{ old('image') }}">
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 col-sm-8 col-sm-offset-4">
                    <button type="submit" name="create" value="create" class="btn btn-primary">Pridėti</button>
                </div>
            </form>
        </div>
    </div>
    @endif
@endif
    <div class="panel panel-primary">
        <div class="panel-heading">Autoriai</div>
        <div class="panel-body">
            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr class="info">
                        <th>#</th>
                        <th>Nuotrauka</th>
                        <th><a href="{{ action('AuthorController@orderByName') }}">Vardas</a></th>
                        <th>Šalis</th>
                        <th class="mobile">Knygos</th>
                        <th class="mobile">Kiek kartų autoriaus <br>knygos buvo paimtos</th>
                        @if (Auth::user())
                            @if (Auth::user()->hasRole("admin"))
                                <th>Veiksmai</th>
                            @endif
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if ($authors->count())
                        @for ($i = 0; $i < count($authors); $i++)
                            <tr>
                                <th>{{ $i+1 }}</th>
                                    <td><img src="{{ URL::to('/') }}/authorsimages/{{ $authors[$i]->image }}" style="height: 50px; width: 50px;">
                                    </td>
                                    <td><a href="/author/{{ $authors[$i]->id }}/books">{{ $authors[$i]->author_name }} ({{$authors[$i]->birth_date}}@if(!empty($authors[$i]->death_date)) - {{ $authors[$i]->death_date }}@endif)</a></td>
                                    <td>{{ $authors[$i]->country }}</td>
                                    <td class="mobile">{{ get_books_by_authors($authors[$i]->id) }}</td>
                                    <td class="mobile"> {{ count_author_taken_times($authors[$i]->id) }} </td>
                                    @if (Auth::user())
                                    @if (Auth::user()->hasRole("admin"))
                                    <td>
                                        <a class="btn btn-default btn-xs"  data-toggle="modal" data-target="#authorEdit{{ $authors[$i]->id }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                        <div class="modal fade" id="authorEdit{{ $authors[$i]->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">{{$authors[$i]->author_name}} {{ $authors[$i]->author_surname }}</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                    @include ('partials.notice')
                                                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/author/' . $authors[$i]->id . '/edit') }}">
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label" for="title">Vardas</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="author_name" name="author_name" value="{{ old('author_name', $authors[$i]->author_name) }}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label" for="country">Šalis</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="country" name="country" value="{{ old('country', $authors[$i]->country) }}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label" for="birth_date">Gimimo data</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date', $authors[$i]->birth_date) }}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-sm-2 control-label" for="death_date">Mirties data</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" id="death_date" name="death_date" value="{{ old('death_date', $authors[$i]->death_date) }}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-2 col-sm-4 control-label" for="image">Nuotrauka</label>
                                                                <div class="col-md-10 col-sm-8">
                                                                    <input type="file" id="image" name="image" value="{{ old('image') }}">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="col-md-6 col-md-offset-4">
                                                                    <button type="submit" class="btn btn-primary">
                                                                        Išsaugoti
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn" data-dismiss="modal">Uždaryti</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-default btn-xs" data-toggle="modal" data-target="#authors-delete-modal{{$authors[$i]->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                        <div class="modal fade" id="authors-delete-modal{{$authors[$i]->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                        <h4 class="modal-title">Panaiktinti autorių</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/authors/' .$authors[$i]->id .'/delete') }}">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <h5>Autorius</h5>
                                                                </div>
                                                                <div>
                                                                    <p>{{ $authors[$i]->author_name }} {{ $authors[$i]->author_surname }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h4>Ar tikrai norite ištrinti?</h4>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <button type="submit" class="btn btn-danger" onclick="$(this).closest('.modal').find('form').submit();">Panaikinti</button>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <button type="button" class="btn" data-dismiss="modal">Atšaukti</button>
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
                            <td class="text-center" colspan="8">Sąrašas tuščias.</td>
                        </tr>
                    @endif
                </tbody>
                
                <tfoot>
                    <tr class="info">
                        <th>#</th>
                        <th>Nuotrauka</th>
                        <th>Vardas</th>
                        <th>Šalis</th>
                        <th class="mobile">Knygos</th>
                        <th class="mobile">Kiek kartų autoriaus <br>knygos buvo paimtos</th>
                        @if (Auth::user())
                            @if (Auth::user()->hasRole("admin"))
                                <th>Veiksmai</th>
                            @endif
                        @endif
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>



@endsection