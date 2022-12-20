<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function users()
    {
        $users=User::all();
        return view('user-list',['users'=>$users]);
    }
}
