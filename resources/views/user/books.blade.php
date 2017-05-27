@extends('welcome')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">Paimtos knygos</div>
    <div class="panel-body">
        <table class="table table-striped table-hover table-condensed">
            <thead>
                <tr class="info">
                    <th>#</th>
                    <th>Pavadinimas</th>
                    <th>Pradžia</th>
                    <th>Pabaiga</th>
                    <th>Perskaityta (Taip/Ne)</th>
                    <th>Darbuotojas</th>
                    <th>Kiek dienų liko</th>
                    <th>Kiek dienų vėluojama</th>
                    @if(is_price() !== '0')
                    <th>Skola</th>
                    @endif
                    <th>Prasitęsti knygą</th>
                </tr>
            </thead>
            <tbody>
                @if ($books->count())
                    @for ($i = 0; $i < count($books); $i++)
                        @if(days_late($books[$i]->id) > 0)
                        <tr  style="color:red">
                        @else
                        <tr>
                        @endif
                            <th>{{ $i+1 }}</th>
                                <td><a href="{{ url('/book/' . $books[$i]->book_id ) }}">{{ get_book($books[$i]->book_id) }}</a></td>
                                <td>{{ $books[$i]->start_day }}</td>
                                <td>{{ $books[$i]->end_day }}</td>
                                <td>
                                    @if( is_read($books[$i]->id) == '0' )
                                    <a class="btn btn-default btn-xs" href="{{ url('/user-books/' . $books[$i]->id . '/read') }}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                    @else
                                    <a class="btn btn-default btn-xs" href="{{ url('/user-books/' . $books[$i]->id . '/not-read') }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                    @endif
                                </td>
                                <td> {{ get_user_name($books[$i]->worker_id) }} 
                                </td>
                                <td> {{ days_left($books[$i]->id) }} </td>
                                <td> {{ days_late($books[$i]->id) }} </td>
                                @if(is_price() !== '0')
                                <td> {{ get_debt($books[$i]->id) }} </td>
                                @endif
                                <td>
                                @if((days_left($books[$i]->id) < 7) && (days_late($books[$i]->id) == 0) && (count_free_books($books[$i]->book_id) > 0))
                                    <a class="btn btn-default btn-xs" href="{{ url('/user-books/' . $books[$i]->book_id . '/' . $books[$i]->id . '/continueBook') }}"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></a>
                                @else
                                    <a class="btn btn-default btn-xs" href="{{ url('/user-books/' . $books[$i]->book_id . '/' . $books[$i]->id . '/continueBook') }}" disabled><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></a>
                                @endif
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
                    <th>Pavadinimas</th>
                    <th>Pradžia</th>
                    <th>Pabaiga</th>
                    <th>Perskaityta (Taip/Ne)</th>
                    <th>Darbuotojas</th>
                    <th>Kiek dienų liko</th>
                    <th>Kiek dienų vėluojama</th>
                    @if(is_price() !== '0')
                    <th>Skola</th>
                    @endif
                    <th>Prasitęsti knygą</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection