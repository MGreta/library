@extends('welcome')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">Grąžinta</div>
    <div class="panel-body">
        <table class="table table-striped table-hover table-condensed">
            <thead>
                <tr class="info">
                    <th>#</th>
                    <th>Vartotojas</th>
                    <th>Pavadinimas</th>
                    <th>Pradžia</th>
                    <th>Pabaiga</th>
                    <th>Perskaityta (Taip/Ne)</th>
                    <th>Darbuotojas</th>
                    <th>Negrąžinta</th>
                </tr>
            </thead>
            <tbody>
                @if ($books->count())
                    @for ($i = 0; $i < count($books); $i++)
                        <tr>
                            <th>{{ $i+1 }}</th>
                                <td><a href="{{ url('/about-user/' . $books[$i]->user_id ) }}"> {{ get_user_name($books[$i]->user_id) }} </a></td>
                                <td><a href="{{ url('/book/' . $books[$i]->book_id ) }}"> {{ get_book($books[$i]->book_id) }} </a></td>
                                <td> {{ $books[$i]->start_day }} </td>
                                <td> {{ $books[$i]->end_day }} </td>
                                <td>
                                    @if(is_read($books[$i]->id) == '1')
                                    Taip
                                    @else
                                    Ne
                                    @endif 
                                </td>
                                <td><a href="{{ url('/about-user/' . $books[$i]->worker_id ) }}"> {{ get_user_name($books[$i]->worker_id) }} </a></td>
                                <td>
                                    <a class="btn btn-default btn-xs" href="{{ url('/returned-books/' . $books[$i]->id . '/not-returned') }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                </td>
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
                    <th>Vartotojas</th>
                    <th>Pavadinimas</th>
                    <th>Pradžia</th>
                    <th>Pabaiga</th>
                    <th>Perskaityta (Taip/Ne)</th>
                    <th>Darbuotojas</th>
                    <th>Negrąžinta</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection