<?php

namespace App\Http\Controllers;

use App\Expenses;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpensesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('welcome');
    }

    public function allExpenses(){
        return view("expenses.index");
    }

    public function fetchAll($month) {
        Expenses::where("created_at", "LIKE", "%{$month}%")
            ->orderBy("created_at, desc")
            ->get();
    }

    public function fetch($month){
        $user = User::findOrFail(Auth::user()->id);
        return response()->json(
                $user->expense()
                ->where("created_at", "LIKE", "%{month}%")
                ->orderBy("created_at", "desc")->get());
    }
    public function create(Request $request){
        $this->validate($request, [
            "desc" => "required",
            "budget" => "required|numeric"
        ]);
        $user = User::findOrFail(Auth::user()->id);
        $inputs = $request->all();
        try {
            $user->expense()->save(
                new Expenses([
                    "desc" => $inputs["desc"],
                    "budget" => $inputs["budget"],
                    "status" => "pending"
                ])
            );
            return response()->json([
                "msg" => "Expense Saved Successfully",
                "expenses" => $user->expense()->orderBy("created_at", "desc")
            ]);
        } catch (QueryException $th) {
            throw $th;
        }
    }

    public function expenseStatus(Request $request) {
        $inputs = $request->all();
        try {
            Expenses::where("id", "=", $inputs["id"])->update([
                "status" => $inputs["status"]
            ]);
        } catch (QueryException $th) {
            throw $th;
        }
        
    }
}
