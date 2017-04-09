@extends('welcome')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">Late Books</div>
    <div class="panel-body">
        <table class="table table-striped table-hover table-condensed">
            <thead>
                <tr class="info">
                    <th>#</th>
                    <th>User</th>
                    <th>Book Title</th>
                    <th>start date</th>
                    <th>end date</th>
                    <th>read(yes/no)</th>
                    <th>admin</th>
                    <th>Days late</th>
                    <th>debt</th>
                    <th>Returned</th>
                </tr>
            </thead>
            <tbody>
                @if ($books->count())
                    @for ($i = 0; $i < count($books); $i++)
                        <tr>
                            <th>{{ $i+1 }}</th>
                                <td> {{ get_user_name($books[$i]->user_id) }} </td>
                                <td> {{ get_book($books[$i]->book_id) }} </td>
                                <td> {{ $books[$i]->start_day }} </td>
                                <td> {{ $books[$i]->end_day }} </td>
                                <td> {{-- $books[$i]->read --}} </td>
                                <td> {{ get_user_name($books[$i]->worker_id) }} </td>
                                <td> {{ days_late($books[$i]->id) }} </td>
                                <td> {{ get_debt($books[$i]->id) }} </td>
                                <td>
                                    <a class="btn btn-default btn-xs" href="{{ url('/late-books/' . $books[$i]->id . '/returned') }}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
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
                    <th>User</th>
                    <th>Book Title</th>
                    <th>start date</th>
                    <th>end date</th>
                    <th>read(yes/no)</th>
                    <th>admin</th>
                    <th>Days late</th>
                    <th>debt</th>
                    <th>Returned</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection