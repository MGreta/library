@extends('welcome')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">Books</div>
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
                    @if(is_price() !== '0')
                    <th>debt</th>
                    @endif
                    <th>Times continued</th>
                    <th>Returned</th>
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
                                <td><a href="{{ url('/about-user/' . $books[$i]->user_id ) }}">{{ get_user_name($books[$i]->user_id) }}</a></td>
                                <td><a href="{{ url('/book/' . $books[$i]->book_id ) }}">{{ get_book($books[$i]->book_id) }}</a></td>
                                <td>{{ $books[$i]->start_day }}</td>
                                <td>{{ $books[$i]->end_day }}</td>
                                <td> 
                                    @if(is_read($books[$i]->id) == '1')
                                    Yes
                                    @else
                                    No
                                    @endif 
                                </td>
                                <td><a href="{{ url('/about-user/' . $books[$i]->worker_id ) }}"> {{ get_user_name($books[$i]->worker_id) }} </a></td>
                                <td> {{ days_late($books[$i]->id) }} </td>
                                @if(is_price() !== '0')
                                <td> {{ get_debt($books[$i]->id) }} </td>
                                @endif
                                <td> {{ $books[$i]->times_continued }} </td>
                                <td>
                                    <a class="btn btn-default btn-xs" href="{{ url('/occupied-books/' . $books[$i]->id . '/returned') }}"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
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
                    @if(is_price() !== '0')
                    <th>debt</th>
                    @endif
                    <th>Times continued</th>
                    <th>Returned</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection