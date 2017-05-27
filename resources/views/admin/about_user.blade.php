@extends('welcome')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">{{ $user->name }}<br>
    </div>
    <div class="panel-body">
        <div class="col-md-12">
            <div class="row form-group">
                <label class="col-sm-2 control-label" for="title">Vardas</label>
                <div class="col-sm-10">
                    <p>{{ $user->name }}</p>
                </div>
            </div>

            <div class="row form-group">
                <label class="col-sm-2 control-label" for="title">Pavardė</label>
                <div class="col-sm-10">
                    <p>{{ $user->last_name }}</p>
                </div>
            </div>

            <div class="row form-group">
                <label class="col-sm-2 control-label" for="title">El. paštas</label>
                <div class="col-sm-10">
                    <p>{{ $user->email }}</p>
                </div>
            </div>

            <div class="row form-group">
                <label class="col-sm-2 control-label" for="title">Rolė</label>
                <div class="col-sm-10">
                    <p>
                        @foreach ($user->roles()->pluck('name', 'slug') as $slug => $role_name)
                            {{ $role_name }}
                        @endforeach
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#readyReservations" aria-expanded="false" aria-controls="readyReservations">
                Paruoštos knygos atsiėmimui
            </a>
        </h4>
    </div>
    <div id="readyReservations" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr class="info">
                        <th>#</th>
                        <th>Knygos pavadinimas</th>
                        <th>Komentaras</th>
                        <th>Rezervacijos pradžios laikas</th>
                        <th>Rezervacijos pabaigos laikas</th>
                        <th>Laisvos</th>
                        <th>Dar neparuošta</th>
                        <th>Paimta</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($ready_reservations->count())
                        @for ($i = 0; $i < count($ready_reservations); $i++)
                            <tr>
                                <th>{{ $i+1 }}</th>
                                    <td>{{ get_book($ready_reservations[$i]->book_id) }}</td>
                                    <td>{{ $ready_reservations[$i]->comment }}</td>
                                    <td>{{ $ready_reservations[$i]->reservation_start_day }}</td>
                                    <td>{{ $ready_reservations[$i]->reservation_end_day }}</td>
                                    <td> {{ count_free_books($ready_reservations[$i]->book_id) }} </td>
                                    <td>
                                        <a class="btn btn-default btn-xs" href="{{ url('/reservations/' . $ready_reservations[$i]->id . '/not-ready') }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                    </td>
                                    <td>
                                        <a class="btn btn-default btn-xs" href="{{ url('/reservations/' . $ready_reservations[$i]->id . '/taken') }}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
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
                        <th>Knygos pavadinimas</th>
                        <th>Komentaras</th>
                        <th>Rezervacijos pradžios laikas</th>
                        <th>Rezervacijos pabaigos laikas</th>
                        <th>Laisvos</th>
                        <th>Dar neparuošta</th>
                        <th>Paimta</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#notReadyReservations" aria-expanded="false" aria-controls="notReadyReservations">
                Rezervacijos
            </a>
        </h4>
    </div>
    <div id="notReadyReservations" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr class="info">
                        <th>#</th>
                        <th>Knygos pavadinimas</th>
                        <th>Komentaras</th>
                        <th>Rezervacijos pradžios laikas</th>
                        <th>Rezervacijos pabaigos laikas</th>
                        <th>Laisvos</th>
                        <th>Paruošta</th>
                        <th>Paimta</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($not_ready_reservations->count())
                        @for ($i = 0; $i < count($not_ready_reservations); $i++)
                            <tr>
                                <th>{{ $i+1 }}</th>
                                    <td>{{ get_book($not_ready_reservations[$i]->book_id) }}</td>
                                    <td>{{ $not_ready_reservations[$i]->comment }}</td>
                                    <td>{{ $not_ready_reservations[$i]->reservation_start_day }}</td>
                                    <td>{{ $not_ready_reservations[$i]->reservation_end_day }}</td>
                                    <td> {{ count_free_books($not_ready_reservations[$i]->book_id) }} </td>
                                    @if(count_free_books($not_ready_reservations[$i]->book_id) < '1')
                                    <td>
                                        <a class="btn btn-default btn-xs" href="{{ url('/reservations/' . $not_ready_reservations[$i]->id . '/ready') }}" disabled><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                    </td>
                                    <td>
                                        <a class="btn btn-default btn-xs" href="{{ url('/reservations/' . $not_ready_reservations[$i]->id . '/taken') }}" disabled><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="btn btn-default btn-xs" href="{{ url('/reservations/' . $not_ready_reservations[$i]->id . '/ready') }}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                    </td>
                                    <td>
                                        <a class="btn btn-default btn-xs" href="{{ url('/reservations/' . $not_ready_reservations[$i]->id . '/taken') }}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                                    </td>
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
                        <th>Knygos pavadinimas</th>
                        <th>Komentaras</th>
                        <th>Rezervacijos pradžios laikas</th>
                        <th>Rezervacijos pabaigos laikas</th>
                        <th>Laisvos</th>
                        <th>Paruošta</th>
                        <th>Paimta</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#takenBooks" aria-expanded="false" aria-controls="takenBooks">
                Paimtos knygos
            </a>
        </h4>
    </div>
    <div id="takenBooks" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr class="info">
                        <th>#</th>
                        <th>Knygos pavadinimas</th>
                        <th>Pradžios laikas</th>
                        <th>Pabaigos laikas</th>
                        <th>Perskaityta(Taip/Ne)</th>
                        <th>Atidavė knygą</th>
                        <th>Kiek dienų liko</th>
                        <th>Kiek dienų vėluoja</th>
                        <th>Skola</th>
                        <th>Prasitesti knyga</th>
                        <th>Grąžinta</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($taken_books->count())
                        @for ($i = 0; $i < count($taken_books); $i++)
                            @if(days_late($taken_books[$i]->id) > 0)
                            <tr  style="color:red" >
                            @else
                            <tr>
                            @endif
                                <th>{{ $i+1 }}</th>
                                    <td>{{ get_book($taken_books[$i]->book_id) }}</td>
                                    <td>{{ $taken_books[$i]->start_day }}</td>
                                    <td>{{ $taken_books[$i]->end_day }}</td>
                                    <td> 
                                        @if(is_read($taken_books[$i]->id) == '1')
                                        Taip
                                        @else
                                        Ne
                                        @endif 
                                    </td>
                                    <td> {{ get_user_name($taken_books[$i]->worker_id) }} </td>
                                    <td> {{ days_left($taken_books[$i]->id) }} </td>
                                    <td> {{ days_late($taken_books[$i]->id) }} </td>
                                    <td> {{ get_debt($taken_books[$i]->id) }} </td>
                                    <td>
                                    @if((days_left($taken_books[$i]->id) < 7) && (days_late($taken_books[$i]->id) == 0) && (count_free_books($taken_books[$i]->book_id) > 0))
                                        <a class="btn btn-default btn-xs" href="{{ url('/occupied-books/' . $taken_books[$i]->book_id . '/' . $taken_books[$i]->id . '/continueBook') }}"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></a>
                                    @else
                                        <a class="btn btn-default btn-xs" href="{{ url('/occupied-books/' . $taken_books[$i]->book_id . '/' . $taken_books[$i]->id . '/continueBook') }}" disabled><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></a>
                                    @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-default btn-xs" href="{{ url('/occupied-books/' . $taken_books[$i]->id . '/returned') }}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
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
                        <th>Knygos pavadinimas</th>
                        <th>Pradžios laikas</th>
                        <th>Pabaigos laikas</th>
                        <th>Perskaityta(Taip/Ne)</th>
                        <th>Atidavė knygą</th>
                        <th>Kiek dienų liko</th>
                        <th>Kiek dienų vėluoja</th>
                        <th>Skola</th>
                        <th>Prasitesti knyga</th>
                        <th>Grąžinta</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#returnedBooks" aria-expanded="false" aria-controls="returnedBooks">
                Grąžintos knygos
            </a>
        </h4>
    </div>
    <div id="returnedBooks" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
            <table class="table table-striped table-hover table-condensed">
                <thead>
                    <tr class="info">
                        <th>#</th>
                        <th>Knygos pavadinimas</th>
                        <th>Pradžios data</th>
                        <th>Pabaigos data</th>
                        <th>Perskaityta(Taip/Ne)</th>
                        <th>Atdavė knygą</th>
                        <th>Negrąžinta</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($returned_books->count())
                        @for ($i = 0; $i < count($returned_books); $i++)
                            <tr>
                                <th>{{ $i+1 }}</th>
                                    <td> {{ get_book($returned_books[$i]->book_id) }} </td>
                                    <td> {{ $returned_books[$i]->start_day }} </td>
                                    <td> {{ $returned_books[$i]->end_day }} </td>
                                    <td>
                                        @if(is_read($taken_books[$i]->id) == '1')
                                        Taip
                                        @else
                                        Ne
                                        @endif 
                                    </td>
                                    <td> {{ get_user_name($returned_books[$i]->worker_id) }} </td>
                                    <td>
                                        <a class="btn btn-default btn-xs" href="{{ url('/returned-books/' . $returned_books[$i]->id . '/not-returned') }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
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
                        <th>Knygos pavadinimas</th>
                        <th>Pradžios data</th>
                        <th>Pabaigos data</th>
                        <th>Perskaityta(Taip/Ne)</th>
                        <th>Atdavė knygą</th>
                        <th>Negrąžinta</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection