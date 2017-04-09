@extends('welcome')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">Books</div>
    <div class="panel-body">
        <table class="table table-striped table-hover table-condensed">
            <thead>
                <tr class="info">
                    <th>#</th>
                    <th>Book Title</th>
                    <th>start date</th>
                    <th>end date</th>
                    <th>read(yes/no)</th>
                    <th>admin</th>
                    <th>Days left</th>
                    <th>Days late</th>
                    <th>debt</th>
                </tr>
            </thead>
            <tbody>
                @if ($books->count())
                    @for ($i = 0; $i < count($books); $i++)
                        @if(is_late($books[$i]->book_id) == $books[$i]->id)
                        <tr  style="color:red" >
                        @else
                        <tr>
                        @endif
                            <th>{{ $i+1 }}</th>
                                <td>{{ get_book($books[$i]->book_id) }}</td>
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
                                <td> {{ get_debt($books[$i]->id) }} </td>
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
                    <th>start date</th>
                    <th>end date</th>
                    <th>read(yes/no)</th>
                    <th>admin</th>
                    <th>Days left</th>
                    <th>Days late</th>
                    <th>debt</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection