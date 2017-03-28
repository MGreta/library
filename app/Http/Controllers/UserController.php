<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use Validator;



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
	public function edit($id)
	{
		$user = Auth::user();
		return view('auth.account', compact('user'));
	}

	public function update(Request $request, User $user)
	{
		$id = Auth::user()->id;
		$validator =  Validator::make($request->all(), [
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'class' => 'max:255',
            'email' => 'max:255'
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($user = User::find($id)) {
            $user->name = $request->input('name');
            $user->last_name = $request->input('last_name');
            $user->class = $request->input('class');
            $user->email = $request->input('email');
            if ($user->save()) {

                return view('auth.account', compact('user'))->with('status', 'Update successful.');
            }

            return redirect('/profile')->with('errors', new MessageBag(['Error saving user. Please try again.']));
        }

        return redirect('/profile')->with('errors', new MessageBag(['Unauthorized action.']));
	}

}
