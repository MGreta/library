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
		return view('admin.users', compact('users'));
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

            return redirect('/admin')->with('status', 'User created successfully.');
        }

        return redirect()->back()->with('errors', new MessageBag(['Something went wrong while adding new user. Please try again.']));
    }

    

    public function editUser($id)
    {
        $user = User::find($id);

        return view('admin.edit_user', compact('user'));
    }

    public function UserEdit($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'class' => 'required|max:255',
            'email' => 'required|max:255'
        ]);
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->class = $request->input('class');
        $user->email = $request->input('email');
        $response = $user->save();
        if ($response) {
            return redirect()->back()
                    ->with(['message' => 'Knyga atnaujintas.']);
        }
        return redirect()->back()
                ->withErrors(['error' => 'Klaida. Neleistinas veiksmas.']);
    }

}
