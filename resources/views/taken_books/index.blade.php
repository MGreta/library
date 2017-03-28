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
                                <td>{{ get_user_name($books[$i]->user_id) }}</td>
                                <td>{{ get_book($books[$i]->book_id) }}</td>
                                <td>{{ $books[$i]->start_day }}</td>
                                <td>{{ $books[$i]->end_day }}</td>
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
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection