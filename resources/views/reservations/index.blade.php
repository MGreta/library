@extends('welcome')

@section('content')

@if( count($reservations_is_ready) != 0 )
<div class="panel panel-primary">
    <div class="panel-heading">Paruoštos atsiimti knygos</div>
    <div class="panel-body">
        <table class="table table-striped table-hover table-condensed">
            <thead>
                <tr class="info">
                    <th>#</th>
                    <th>Vartotojas</th>
                    <th>Knyga</th>
                    <th>Komentaras</th>
                    <th>Rezervacijos pradžia</th>
                    <th>Rezervacijos pabaiga</th>
                    <th>Laivos</th>
                    <th>Neparuošta</th>
                    <th>Paimta</th>
                    <th>Panaikinti rezervaciją</th>
                </tr>
            </thead>
            <tbody>
                @if ($reservations_is_ready->count())
                    @for ($i = 0; $i < count($reservations_is_ready); $i++)
                        <tr>
                            <th>{{ $i+1 }}</th>
                                <td>{{ get_user_name($reservations_is_ready[$i]->user_id) }}</td>
                                <td><a href="{{ url('/book/' . $reservations_is_ready[$i]->book_id ) }}">{{ get_book($reservations_is_ready[$i]->book_id) }}</a></td>
                                <td>{{ $reservations_is_ready[$i]->comment }}</td>
                                <td>{{ $reservations_is_ready[$i]->reservation_start_day }}</td>
                                <td>{{ $reservations_is_ready[$i]->reservation_end_day }}</td>
                                <td> {{ count_free_books($reservations_is_ready[$i]->book_id) }} </td>
                                @if(is_canceled_reservation($reservations_is_ready[$i]->id) == '1')
                                    <td>
                                        <a class="btn btn-default btn-xs" href="{{ url('/reservations/' . $reservations_is_ready[$i]->id . '/not-ready') }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                    </td>
                                    <td>
                                        <a class="btn btn-default btn-xs" href="{{ url('/reservations/' . $reservations_is_ready[$i]->id . '/taken') }}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="btn btn-default btn-xs" href="{{ url('/reservations/' . $reservations_is_ready[$i]->id . '/not-ready') }}" disabled><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                    </td>
                                    <td>
                                        <a class="btn btn-default btn-xs" href="{{ url('/reservations/' . $reservations_is_ready[$i]->id . '/taken') }}" disabled><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                    </td>
                                @endif
                                <td>
                                @if(is_canceled_reservation($reservations_is_ready[$i]->id) == '0')
                                    <a class="btn btn-default btn-xs" href="{{ url('/reservations/' . $reservations_is_ready[$i]->id . '/remove') }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                @else
                                    <a class="btn btn-default btn-xs" href="{{ url('/reservations/' . $reservations_is_ready[$i]->id . '/remove') }}" disabled><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
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
                    <th>Vartotojas</th>
                    <th>Knyga</th>
                    <th>Komentaras</th>
                    <th>Rezervacijos pradžia</th>
                    <th>Rezervacijos pabaiga</th>
                    <th>Laivos</th>
                    <th>Neparuošta</th>
                    <th>Paimta</th>
                    <th>Panaikinti rezervaciją</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endif

@if( count($reservations) != 0 )
<div class="panel panel-primary">
    <div class="panel-heading">Neparuoštos rezervacijos</div>
    <div class="panel-body">
        <table class="table table-striped table-hover table-condensed">
            <thead>
                <tr class="info">
                    <th>#</th>
                    <th>Vartotojas</th>
                    <th>Knyga</th>
                    <th>Komentaras</th>
                    <th>Rezervacijos pradžia</th>
                    <th>Rezervacijos pabaiga</th>
                    <th>Laisvos</th>
                    <th>Paruošta</th>
                    <th>Paimta</th>
                    <th>Panaikinti rezervaciją</th>
                </tr>
            </thead>
            <tbody>
                @if ($reservations->count())
                    @for ($i = 0; $i < count($reservations); $i++)
                        @if(is_canceled_reservation($reservations[$i]->id) == '0')
                        <tr style="color: #777;">
                        @else
                        <tr>
                        @endif
                            <th>{{ $i+1 }}</th>
                                <td><a href="{{ url('/about-user/' . $reservations[$i]->user_id ) }}">{{ get_user_name($reservations[$i]->user_id) }}</a></td>
                                <td><a href="{{ url('/book/' . $reservations[$i]->book_id ) }}">{{ get_book($reservations[$i]->book_id) }}</a></td>
                                <td>{{ $reservations[$i]->comment }}</td>
                                <td>{{ $reservations[$i]->reservation_start_day }}</td>
                                <td>{{ $reservations[$i]->reservation_end_day }}</td>
                                <td> {{ count_free_books($reservations[$i]->book_id) }} </td>
                                @if((count_free_books($reservations[$i]->book_id) > '0') && (is_canceled_reservation($reservations[$i]->id) == '1'))
                                    <td>
                                        <a class="btn btn-default btn-xs" href="{{ url('/reservations/' . $reservations[$i]->id . '/ready') }}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                    </td>
                                    <td>
                                        <a class="btn btn-default btn-xs" href="{{ url('/reservations/' . $reservations[$i]->id . '/taken') }}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="btn btn-default btn-xs" href="{{ url('/reservations/' . $reservations[$i]->id . '/ready') }}" disabled><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                    </td>
                                    <td>
                                        <a class="btn btn-default btn-xs" href="{{ url('/reservations/' . $reservations[$i]->id . '/taken') }}" disabled><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                    </td>
                                @endif
                                <td>
                                @if(is_canceled_reservation($reservations[$i]->id) == '0')
                                    <a class="btn btn-default btn-xs" href="{{ url('/reservations/' . $reservations[$i]->id . '/remove') }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                @else
                                    <a class="btn btn-default btn-xs" href="{{ url('/reservations/' . $reservations[$i]->id . '/remove') }}" disabled><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
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
                    <th>Vartotojas</th>
                    <th>Knyga</th>
                    <th>Komentaras</th>
                    <th>Rezervacijos pradžia</th>
                    <th>Rezervacijos pabaiga</th>
                    <th>Laisvos</th>
                    <th>Paruošta</th>
                    <th>Paimta</th>
                    <th>Panaikinti rezervaciją</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endif

@endsection