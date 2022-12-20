<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class  AuthController extends Controller
{
    public function registerShow()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $arr = $request->validated();


        $user = User::create([
            'name' => $arr['name'],
            'email' => $arr['email'],
            'password' => bcrypt($arr['password'])

        ]);

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

    public function index()
    {
        return view('auth.auth');
    }

    public function apiLogin(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('email', $validator['email'])->first();

        if (!$user || !Hash::check($validator['password'], $user->password)) {
            return response([
                'message' => 'wrong credentials'
            ]);
        }
        $token = $user->createToken('myToken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

}
