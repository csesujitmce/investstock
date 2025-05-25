<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', function () {
    return view('registration');
})->name('registration');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/test', function () {
    return view('sample');
})->middleware('auth');

Route::post('/register', [UserController::class, 'register'])->name('registerpost');
Route::post('/login', [UserController::class, 'userlogin'])->name('userloginpost');

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');
