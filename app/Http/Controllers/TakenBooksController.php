<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use Session;
use App\TakenBooks;
use Carbon\Carbon;
use DB;
use App\Book;
use App\User;
use Illuminate\Support\MessageBag;
use App\Option;
use App\Book_reservations;

class TakenBooksController extends Controller
{
    public function index() 
    {
    	$books = TakenBooks::where('returned', '0')->orderBy('end_day')->get();
    	return view('taken_books.index', compact('books'));
    }

    public function late() 
    {
    	$books = TakenBooks::where('returned', '0')->where('end_day', '<', Carbon::now())->orderBy('end_day')->get();
    	return view('taken_books.late', compact('books'));
    }

    public function returnedBooks()
    {
    	$books = TakenBooks::where('returned', '1')->orderBy('end_day')->get();
    	return view('taken_books.returned', compact('books'));
    }

    public function returned(Request $request, $id)
    {
    	$book = TakenBooks::find($id);
    	$book->returned = '1';
    	$response = $book->save();
        if ($response) {
            return redirect()->back()->with('success');
        } else {
            return redirect()->back()->with('errors', new MessageBag(['Statuso pakeisti nepavyko. Bandykite dar kartą.']));
        }
    }

    public function notReturned(Request $request, $id)
    {
    	$book = TakenBooks::find($id);
    	$book->returned = '0';
    	$response = $book->save();
        if ($response) {
            return redirect()->back()->with('success');
        } else {
            return redirect()->back()->with('errors', new MessageBag(['Statuso pakeisti nepavyko. Bandykite dar kartą.']));
        }
    }

    public function registerBookIndex(Request $request)
    {
        $books = Book::all();
        $users = User::all();

        return view('taken_books.register', compact('books', 'users'));
    }

    public function registerBook(Request $request)
    {

    }

    public function continuedBooks()
    {
        $books = TakenBooks::where('returned', '0')->where('times_continued', '>', '0')->orderBy('end_day')->get();
        return view('taken_books.continued_books', compact('books'));
    }

    public function continueBook($id, $taken_id)
    {
        $days = Option::where('name', 'days_to_have_book')->value('value');

        $all = Book::where('id', $id)->value('quantity');
        $reserved = Book_reservations::where('book_id', $id)->count();
        $taken = TakenBooks::where('book_id', $id)->where('returned', '=', '0')->count();

        $free = $all - $reserved - $taken;
        $taken_book_id = TakenBooks::where('book_id', $id)->where('id', $taken_id)->value('id');
        $times_continued = TakenBooks::where('id', $taken_book_id)->value('times_continued');
        if ($free > 0)
        {
            if ($book = TakenBooks::find($taken_book_id)) {
                $book = TakenBooks::find($taken_book_id);
                $book->end_day = Carbon::now()->addDays($days);
                $times_continued = $times_continued + 1;
                $book->times_continued = $times_continued;
                $response = $book->save();
                if ($response) {
                    return redirect()->back()->with(['message' => 'Rezervacija sėkmingai pratęsta.']);
                }
                return redirect('/books');
            }
        } else 
        {
            return redirect('/occupied-books');
        }
    }
}
