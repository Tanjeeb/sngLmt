<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PagesController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function registerShow()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $arr=$request->validated();


        $user = User::create($arr);

        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/user-list');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function users()
    {
        $user = Auth::user()->role;

        if (Gate::allows('isAdmin', $user) || Gate::allows('superAdmin', $user)) {
            $users = User::all();
            return view('user-list', ['users' => $users]);

        } else {

            dd('You are not authorized for this page');

        }

    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }
}
