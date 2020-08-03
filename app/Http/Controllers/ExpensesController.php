<?php

namespace App\Http\Controllers;

use App\Expenses;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function fetch(Request $request){
        $inputs = $request->all();
        try {
            $expenses = DB::table("expenses")
                ->where("expenses.created_at", "LIKE", "%{$inputs['month']}%")
                ->where("user_id", "=", Auth::user()->id)
                ->join("users", "expenses.user_id", "=", "users.id")
                ->select(
                    "expenses.id",
                    "expenses.desc",
                    "expenses.created_at",
                    "expenses.budget",
                    "expenses.status",
                    "expenses.user_id",
                    "users.name",
                    "users.userType"
                )
                ->orderBy("created_at", "desc")->get();
            return response()->json($expenses);
        } catch (QueryException $th) {
            throw $th;
        }
        
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
                "msg" => "Expense Saved Successfully"
            ]);
        } catch (QueryException $th) {
            throw $th;
        }
    }

    public function edit(Request $request)
    {
        $this->validate($request, [
            "desc" => "required",
            "budget" => "required|numeric"
        ]);
        $inputs = $request->all();
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
