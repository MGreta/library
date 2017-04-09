<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use Session;
use App\TakenBooks;
use Carbon\Carbon;
use DB;

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
            return redirect()->back()->with('errors', new MessageBag(['Something went wrong. Please try again.']));
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
            return redirect()->back()->with('errors', new MessageBag(['Something went wrong. Please try again.']));
        }
    }
}
