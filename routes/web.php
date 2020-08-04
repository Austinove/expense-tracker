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

Auth::routes();

Route::get("/home", "HomeController@index")->name("home");
Route::get("/profile", "UserController@index")->name('profile');
Route::post("/edit/profile", "UserController@edit")->name("editUser");
Route::get("/members", "UserController@members")->name("members");
Route::post("/status/actions", "UserController@status")->name("status");

Route::get("/all/expenses", "ExpensesController@allExpenses")->name("allExpenses");
Route::get("/dashboard", "ExpensesController@index")->name("welcome");
Route::post("/expense", "ExpensesController@create")->name("createExpense");
Route::post("/expenses/fetch", "ExpensesController@fetch")->name("fetchExpenses");
Route::post("/expenses/edit/{id}", "ExpensesController@edit")->name("editExpenses");
Route::post("expenses/delete", "ExpensesController@destroy")->name("deleteExpense");
Route::post("expenses/actions", "ExpensesController@action")->name("expenseAction");
Route::get("expenses/pending", "ExpensesController@pending")->name("pending")->middleware("chairman");
Route::post("expenses/fetchPending", "ExpensesController@fetchPending")->name("fetchPending")->middleware("chairman");
Route::get("expenses/recommended", "ExpensesController@recommended")->name("recommended")->middleware("treasurer");
Route::post("expenses/fetchReco", "ExpensesController@fetchReco")->name("fetchRecommended")->middleware("treasurer");
