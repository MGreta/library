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
use Illuminate\Support\MessageBag;
use App\Option;

class Book_reservationsController extends Controller
{
    public function index() 
    {
        $reservations = Book_reservations::where('is_ready', '0')->get();
        $reservations_is_ready = Book_reservations::where('is_ready', '1')->get();
        
        return view('reservations.index', compact('reservations', 'reservations_is_ready'));
    }

	public function store(Request $request)
    {
    	$user_id = Auth::user()->id;
        $days = Option::where('name', 'days_to_have_book')->value('value');
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $books = $cart->items;
        if ($request->has('create')) {
        	foreach ($books as $book) {
                
                $book_id = $book['item']['id'];
                $book = new Book_reservations();
                $book->user_id = $user_id;
                $book->book_id = $book_id;
                $book->comment = $request->input('comment');
                $book->reservation_start_day = Carbon::now();
                $book->reservation_end_day = Carbon::now()->addDays($days);
                $book->save();
        	}

        	Session::forget('cart');
            return redirect('/books')->with('status', 'Rezervacija išsaugota sėkmingai.');
        }

        return redirect()->back()->with('errors', new MessageBag(['Rezervacijos išsaugoti nepavyko. Bandykite dar kartą.']));
    }

    public function getRemoveItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect('/shopping-cart');
    }

    public function postToTakenBooks(Request $request, $id) {
        $days = Option::where('name', 'days_to_have_book')->value('value');

    	$book_id = Book_reservations::where('id', $id)->value('book_id');
    	$user_id = Book_reservations::where('id', $id)->value('user_id');
        $worker_id = Auth::user()->id;
    	$book = new TakenBooks();
    	$book->book_id = $book_id;
    	$book->user_id = $user_id;
    	$book->start_day = Carbon::now();
    	$book->end_day = Carbon::now()->addDays($days);
        $book->worker_id = $worker_id;
    	$response = $book->save();
    	if ($response) {
    		DB::table('Book_reservations')->where('id', $id)->delete();
    		return redirect('/reservations');
    	} else {
    		return redirect()->back()->with('errors', new MessageBag(['Išduoti knygos nepavyko. Bandykite dar kartą.']));
    	}
    }
    public function bookIsReady(Request $request, $id) {
        $book = Book_reservations::find($id);
        $book->is_ready = '1';
        $response = $book->save();
        if ($response) {
            return redirect('/reservations');
        } else {
            return redirect()->back()->with('errors', new MessageBag(['Pakeisti knygos statuso nepavyko. Bandykite dar kartą.']));
        }
    }

    public function bookNotReady(Request $request, $id) {
        $book = Book_reservations::find($id);
        $book->is_ready = '0';
        $response = $book->save();
        if ($response) {
            return redirect('/reservations');
        } else {
            return redirect()->back()->with('errors', new MessageBag(['Pakeisti knygos statuso nepavyko. Bandykite dar kartą.']));
        }
    }

    public function removeReservation(Request $request, $id)
    {

        DB::table('Book_reservations')->where('id', $id)->delete();
        return redirect('/reservations');
    }
}
