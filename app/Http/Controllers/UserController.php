<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use Validator;
use App\TakenBooks;
use App\Book_reservations;
use Carbon\Carbon;
use App\Book;
use Illuminate\Support\MessageBag;
use App\Option;


class UserController extends Controller
{
    public function getLogin()
    {
        return view('user.login');
    }
	public function profile()
	{
		/*$user = Auth::user();
		if (Auth::user()->hasRole("admin")) {
            return view('admin.index', compact('user'));
        } else {
            return view('user.index', compact('user'));
        }*/   
        $user = Auth::user();

        return view('user.index', compact('user'));

	}
	/*public function edit($id)
	{
		$user = Auth::user();
		return view('auth.account', compact('user'));
	}*/

	public function update(Request $request)
	{
		$id = Auth::user()->id;
		$validator =  Validator::make($request->all(), [
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'max:255'
        ]);

        if ($validator->fails()) {

            return redirect('/profile')->with('errors', new MessageBag(['Error saving user. Please try again.']));
        }

        if ($user = User::find($id)) {
            $user->name = $request->input('name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            if ($user->save()) {

                return view('user.index', compact('user'))->with('status', 'Update successful.');
            }

            return redirect('/profile')->with('errors', new MessageBag(['Error saving user. Please try again.']));
        }

        return redirect('/profile')->with('errors', new MessageBag(['Unauthorized action.']));
	}

    public function books()
    {
        $user_id = Auth::user()->id;
        $books = TakenBooks::where('user_id', $user_id)->where('returned', '0')->get();

        return view('user.books', compact('books'));
    }

    public function lateBooks()
    {
        $user_id = Auth::user()->id;
        $books = TakenBooks::where('user_id', $user_id)->where('returned', '0')->where('end_day', '<', Carbon::now())->get();

        return view('user.late_books', compact('books'));
    }

    public function returnedBooks()
    {
        $user_id = Auth::user()->id;
        $books = TakenBooks::where('user_id', $user_id)->where('returned', '1')->get();

        return view('user.returned_books', compact('books'));
    }

    public function reservedBooks()
    {
        $user_id = Auth::user()->id;
        $reservations = Book_reservations::where('user_id', $user_id)->where('is_ready', '0')->get();
        $reservations_is_ready = Book_reservations::where('user_id', $user_id)->where('is_ready', '1')->get();

        return view('user.reserved_books', compact('reservations', 'reservations_is_ready'));
    }

    public function removeReservation(Request $request, $id)
    {
        //$user_id = Auth::user()->id;

        if ($book = Book_reservations::find($id)) {
            $book->is_active = '0';
            $response = $book->save();
            if ($response) {
                return redirect()->back()->with(['message' => 'Reservacija panaikinta.']);
            }
            return redirect('/user-reserved-books');
        }


        /*DB::table('Book_reservations')->where('id', $id)->where('user_id', $user_id)->delete();
        if ($response) {
            return redirect('/user-reserved-books');
        } else {
            return redirect()->back()->with('errors', new MessageBag(['Something went wrong. Please try again.']));
        }*/
    }

    public function readBook($id)
    {
        if ($book = TakenBooks::find($id)) {
            $book->read = '1';
            $response = $book->save();
            if ($response) {
                return redirect()->back()->with(['message' => 'Knyga atnaujintas.']);
            }
            return redirect('/user-books');
        }
    }

    public function notReadBook($id)
    {
        if ($book = TakenBooks::find($id)) {
            $book->read = '0';
            $response = $book->save();
            if ($response) {
                return redirect()->back()->with(['message' => 'Knyga atnaujintas.']);
            }
            return redirect('/user-books');
        }
    }

    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->back();
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
                    return redirect()->back()->with(['message' => 'Rezrevacija pratesta.']);
                }
                return redirect('/books');
            }
        } else 
        {
            /*return redirect()->back()->withErrors(['error' => 'Knygos prasitesti negalima.']);*/
            return redirect('/user-returned-books');
        }
    }
}
