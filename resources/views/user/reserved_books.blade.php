@extends('welcome')

@section('content')

@if( count($reservations_is_ready) != 0 )
<div class="panel panel-primary">
    <div class="panel-heading">Ready books</div>
    <div class="panel-body">
        <table class="table table-striped table-hover table-condensed">
            <thead>
                <tr class="info">
                    <th>#</th>
                    <th>Book Title</th>
                    <th>Comment</th>
                    <th>Reservation start date</th>
                    <th>Reservation end date</th>
                </tr>
            </thead>
            <tbody>
                @if ($reservations_is_ready->count())
                    @for ($i = 0; $i < count($reservations_is_ready); $i++)
                        <tr>
                            <th>{{ $i+1 }}</th>
                                <td>{{ get_book($reservations_is_ready[$i]->book_id) }}</td>
                                <td>{{ $reservations_is_ready[$i]->comment }}</td>
                                <td>{{ $reservations_is_ready[$i]->reservation_start_day }}</td>
                                <td>{{ $reservations_is_ready[$i]->reservation_end_day }}</td>
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
                    <th>Book Title</th>
                    <th>Comment</th>
                    <th>Reservation start date</th>
                    <th>Reservation end date</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endif

<div class="panel panel-primary">
    <div class="panel-heading">Books reservations</div>
    <div class="panel-body">
        <table class="table table-striped table-hover table-condensed">
            <thead>
                <tr class="info">
                    <th>#</th>
                    <th>Book Title</th>
                    <th>Comment</th>
                    <th>Reservation start date</th>
                    <th>Reservation end date</th>
                    <th>Cancel reservation</th>
                </tr>
            </thead>
            <tbody>
                @if ($reservations->count())
                    @for ($i = 0; $i < count($reservations); $i++)
                        <tr>
                            <th>{{ $i+1 }}</th>
                                <td>{{ get_book($reservations[$i]->book_id) }}</td>
                                <td>{{ $reservations[$i]->comment }}</td>
                                <td>{{ $reservations[$i]->reservation_start_day }}</td>
                                <td>{{ $reservations[$i]->reservation_end_day }}</td>
                                <td>
                                    <a class="btn btn-default btn-xs" href="{{ url('/user-reserved-books/' . $reservations[$i]->id . '/cancel') }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
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
                    <th>Book Title</th>
                    <th>Comment</th>
                    <th>Reservation start date</th>
                    <th>Reservation end date</th>
                    <th>Cancel reservation</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection