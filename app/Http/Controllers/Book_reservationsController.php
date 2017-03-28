<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Book_reservations;
use Auth;
use Session;
use App\Cart;
use App\TakenBooks;
use Carbon\Carbon;
use DB;

class Book_reservationsController extends Controller
{
    public function index() 
    {
        $reservations = Book_reservations::where('is_ready', '0')->get();
        $reservations_is_ready = Book_reservations::where('is_ready', '1')->get();
        return view('reservations.index', compact('reservations', 'reservations_is_ready'));
    }

/*    public function add()
	{
        
		return view('admin.create_user', compact('roles'));
	}*/

	public function store(Request $request)
    {
    	$user_id = Auth::user()->id;
        /*$validator =  Validator::make($request->all(), [
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'role' => 'required|exists:roles,id',
            'class' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }*/

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $books = $cart->items;
        if ($request->has('create')) {
        	foreach ($books as $book) {
        		$book_id = $book['item']['id'];
	            $book = new Book_reservations();
	            $book->user_id = $user_id;
	            $book->book_id = $book_id;
	            $book->comment = 'labas';
	            $book->reservation_start_day = '2017-03-10';
	            $book->reservation_end_day = '2017-04-10';
	            $book->save();
        	}

        	Session::forget('cart');
            return redirect('/books')->with('status', 'User created successfully.');
        }

        return redirect()->back()->with('errors', new MessageBag(['Something went wrong while adding new user. Please try again.']));
    }

    public function postToTakenBooks(Request $request, $id) {
    	$book_id = Book_reservations::where('id', $id)->value('book_id');
    	$user_id = Book_reservations::where('id', $id)->value('user_id');
    	$book = new TakenBooks();
    	$book->book_id = $book_id;
    	$book->user_id = $user_id;
    	$book->start_day = Carbon::now();
    	$book->end_day = Carbon::now()->addDays(30);
    	$response = $book->save();
    	if ($response) {
    		DB::table('Book_reservations')->where('id', $id)->delete();
    		return redirect('/reservations');
    	} else {
    		return redirect()->back()->with('errors', new MessageBag(['Something went wrong. Please try again.']));
    	}
    }
    public function bookIsReady(Request $request, $id) {
        $book = Book_reservations::find($id);
        $book->is_ready = '1';
        $response = $book->save();
        if ($response) {
            return redirect('/reservations');
        } else {
            return redirect()->back()->with('errors', new MessageBag(['Something went wrong. Please try again.']));
        }
    }

    public function bookNotReady(Request $request, $id) {
        $book = Book_reservations::find($id);
        $book->is_ready = '0';
        $response = $book->save();
        if ($response) {
            return redirect('/reservations');
        } else {
            return redirect()->back()->with('errors', new MessageBag(['Something went wrong. Please try again.']));
        }
    }
}
