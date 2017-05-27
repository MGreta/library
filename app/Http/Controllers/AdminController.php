<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Book;
use Validator;
use App\Language;
use App\Type;
use App\Book_reservations;
use App\Role;
use DB;
use Session;
use App\Cart;
use App\TakenBooks;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\MessageBag;

class AdminController extends Controller
{
    public function index()
	{
        $roles = Role::all();

		return view('admin.index', compact('roles'));
	}

	public function addUser()
	{
        $roles = Role::all();
		return view('admin.create_user', compact('roles'));
	}

	public function allUsers()
	{
        $roles = Role::all();
		$users = User::all();
		return view('admin.users', compact('users', 'roles'));
	}

    public function aboutUser($id)
    {
        $user = User::find($id);

        $ready_reservations = Book_reservations::where('user_id', $id)->where('is_ready', '1')->get();
        $not_ready_reservations = Book_reservations::where('user_id', $id)->where('is_ready', '0')->get();
        $taken_books = TakenBooks::where('user_id', $id)->where('returned', '0')->orderBy('end_day')->get();
        $returned_books = TakenBooks::where('user_id', $id)->where('returned', '1')->orderBy('end_day')->get();

        return view('admin.about_user', compact('user', 'ready_reservations', 'not_ready_reservations', 'taken_books', 'returned_books'));
    }

    //Order Users by
    public function orderByFirstName()
    {
        $users = DB::table('users')->orderBy('name')->get();
        return view('admin.users', compact('users'));
    }

    public function orderByLastName()
    {
        $users = DB::table('users')->orderBy('last_name')->get();
        return view('admin.users', compact('users'));
    }

    public function orderByEmail()
    {
        $users = DB::table('users')->orderBy('email')->get();
        return view('admin.users', compact('users'));
    }

    public function orderByClass()
    {
        $users = DB::table('users')->orderBy('class')->get();
        return view('admin.users', compact('users'));
    }

    public function orderByRole()
    {
        $users = DB::table('users')->orderBy('role')->get();
        return view('admin.users', compact('users'));
    }
    //Order Users by

	

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeUser(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'role' => 'required|exists:roles,id',
            'class' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->has('create')) {
            $user = User::create([
                'name' => $request->input('name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'class' => $request->input('class'),
                'password' => bcrypt($request->input('password')),
            ]);
            if ($user) {
                if ($role = Role::where('id', $request->input('role'))->value('id')) {
                    $user->roles()->attach($role);
                }
            }

            return redirect('/admin')->with('status', 'Vartotojas pridėtas.');
        }

        return redirect()->back()->with('errors', new MessageBag(['Kažką negerai įvedėte. Bandykite dar kartą.']));
    }

    

    /*public function editUser($id)
    {
        $user = User::find($id);

        return view('admin.edit_user', compact('user'));
    }*/

    public function UserEdit($id, Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(['error' => 'Kažkas negerai įvesta.'])->with('wrong_id', $id);
        }

        if ($user = User::find($id)) {
            $user->name = $request->input('name');
            $user->last_name = $request->input('last_name');
            $user->class = $request->input('class');
            $user->email = $request->input('email');
            $response = $user->save();
            if ($response) {
                $user->roles()->detach();
                $user->roles()->attach($request->input('role'));
                return redirect()->back()->with(['message' => 'Vartotojo informacija atnaujinta.']);
            }
            return redirect('/all-users');
        }
    }
    //shopping cart
    public function shoppingCart()
    {
        if (!Session::has('cart')) {
            return view('user.shopping_cart', ['books' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $users = User::all();


        $books = $cart->items;
        foreach ($books as $book) {
            if (count_free_books($book['item']['id']) == '0') {

                $book_id = $book['item']['id'];
                $will_be_free = TakenBooks::where('book_id', $book_id)->orderBy('end_day')->first();

                return view('user.shopping_cart')->with('books', $books)->with('will_be_free', $will_be_free)->with('successMsg','Knyga turėtų būti laisva nuo ');
            }
        }

        return view('admin.shopping_cart', ['books' => $cart->items], compact('users'));
    }

    public function store(Request $request)
    {
        $user_id = $request->input('user');
        $admin_id = Auth::user()->id;
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $books = $cart->items;
        if ($request->has('create')) {
            foreach ($books as $book) {
                
                $book_id = $book['item']['id'];
                $book = new TakenBooks();
                $book->user_id = $user_id;
                $book->book_id = $book_id;
                $book->start_day = Carbon::now();
                $book->end_day = Carbon::now()->addDays(30);
                $book->worker_id = $admin_id;
                $book->save();
            }

            Session::forget('cart');
            return redirect('/books')->with('status', 'Rezervacija sėkminga.');
        }

        return redirect()->back()->with('errors', new MessageBag(['Rezervacija nepavyko. Bandykite dar kartą.']));
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
        return redirect()->back();
    }

    public function usersSearch(Request $request) {
        $searchValues = preg_split('/\s+/', $request->search, -1, PREG_SPLIT_NO_EMPTY);
        $users = User::where(function($q) use ($searchValues) {
                        foreach ($searchValues as $value) {
                            $q->orwhere('name', 'LIKE', "%{$value}%")
                                ->orWhere('last_name', 'LIKE', "%{$value}%")
                                ->orWhere('email', 'LIKE', "%{$value}%");
                        }
                    })->get();
        $roles = Role::all();

        return view('search.users_search', compact('users', 'roles'));
    }

}
