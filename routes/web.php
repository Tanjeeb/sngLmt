<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PagesController::class, 'index'])->name('home')->middleware('auth');
Route::get('/login', [PagesController::class, 'login'])->name('login');
Route::post('/login', [PagesController::class, 'loginPost'])->name('auth.post');
Route::get('/register', [PagesController::class, 'registerShow'])->name('register');
Route::post('/register', [PagesController::class, 'register'])->name('auth.register');
Route::get('/logout', [PagesController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/user-list', [PagesController::class, 'users'])->name('user')->middleware('auth');
