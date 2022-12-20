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


}
