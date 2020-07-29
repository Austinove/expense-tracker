<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('welcome');
})->name('welcome');

Route::get('/all/expenses', function () {
    return view('expenses.index');
})->name('allExpenses');

Route::get('/profile', function () {
    return view('auth.profile');
})->name('profile');

Route::get('/members', function () {
    return view('members');
})->name('members');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
