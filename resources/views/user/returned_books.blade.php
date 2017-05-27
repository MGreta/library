@extends('welcome')

@section('content')

<div class="panel panel-primary">
    <div class="panel-heading">Grąžintos knygos</div>
    <div class="panel-body">
        <table class="table table-striped table-hover table-condensed">
            <thead>
                <tr class="info">
                    <th>#</th>
                    <th>Pavadinimas</th>
                    <th>Pradžia</th>
                    <th>Pabaigae</th>
                    <th>Perskaityta (Taip/Ne)</th>
                    <th>Darbuotojas</th>
                </tr>
            </thead>
            <tbody>
                @if ($books->count())
                    @for ($i = 0; $i < count($books); $i++)
                        <tr>
                            <th>{{ $i+1 }}</th>
                                <td><a href="{{ url('/book/' . $books[$i]->book_id ) }}"> {{ get_book($books[$i]->book_id) }} </a></td>
                                <td> {{ $books[$i]->start_day }} </td>
                                <td> {{ $books[$i]->end_day }} </td>
                                <td> {{-- $books[$i]->read --}} </td>
                                <td> {{ get_user_name($books[$i]->worker_id) }} </td>
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
                    <th>Pabaigae</th>
                    <th>Perskaityta (Taip/Ne)</th>
                    <th>Darbuotojas</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

@endsection