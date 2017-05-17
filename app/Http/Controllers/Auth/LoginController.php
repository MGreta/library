<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
    {
        return '/profile';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if ($this->auth->attempt($credentials)) {

            $user = $this->auth->user();
            $has_logged_in = $user->has_logged_in;
            $user->has_logged_in = 1;
            $user->save();
            $user = Auth::user();

            /*if (Auth::user()->hasRole("admin")) {
                return view('admin.index', compact('user'));
            } else {
                return view('user.index', compact('user'));
            } */  

            return view('welcome', compact('user'));
        }

        return redirect('login')
                    ->withInput($request->only('email'))
                    ->withErrors([
                        'email' => 'Vartotojo el. paštas arba slaptažodis įvestas neteisingai.',
                    ]);
    }

    protected $redirectAfterLogout = '/';
}
