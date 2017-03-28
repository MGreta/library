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
    public function index() {
    	$books = TakenBooks::orderBy('end_day')->get();
    	return view('taken_books.index', compact('books'));
    }

    public function late() {
    	$books = TakenBooks::orderBy('end_day')->get();
    	return view('taken_books.late', compact('books'));
    }
}
