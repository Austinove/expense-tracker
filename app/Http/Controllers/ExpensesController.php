<?php

namespace App\Http\Controllers;

use App\Expenses;
use App\User;
use Facade\Ignition\QueryRecorder\Query;
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

    public function index()
    {
        return view('welcome');
    }

    public function allExpenses()
    {
        return view("expenses.index");
    }

    public function pending()
    {
        return view("expenses.pending");
    }

    public function fetchPending(Request $request)
    {
        $inputs = $request->all();
        try {
            $expenses = DB::table("expenses")
            ->where("expenses.created_at", "LIKE", "%{$inputs['month']}%")
            ->where("expenses.status", "=", "pending")
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

    public function recommended()
    {
        return view("expenses.recommend");
    }

    public function fertchReco(Request $request)
    {
        $inputs = $request->all();
        try {
            $expenses = DB::table("expenses")
            ->where("expenses.created_at", "LIKE", "%{$inputs['month']}%")
            ->where("expenses.status", "=", "recommend")
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

    public function fetchAll($month)
    {
        Expenses::where("created_at", "LIKE", "%{$month}%")
            ->orderBy("created_at, desc")
            ->get();
    }

    public function fetch(Request $request)
    {
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

    public function create(Request $request)
    {
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

    public function edit($id, Request $request)
    {
        $this->validate($request, [
            "desc" => "required",
            "budget" => "required|numeric"
        ]);
        $inputs = $request->all();
        $user = User::findOrFail(Auth::user()->id);
        try {
            $user->expense()->where("id", "=", $id)->update([
                "desc" => $inputs['desc'],
                "budget" => $inputs['budget']
            ]);
            return response()->json(["msg" => "Operation successfully"]);
        } catch (QueryException $th) {
            throw $th;
        }
    }

    public function destroy(Request $request)
    {
        $inputs = $request->all();
        $user = User::findOrFail(Auth::user()->id);
        try {
            $user->expense()->where("id", "=", $inputs['id'])->delete();
            return response()->json(["msg"=> "Deleted Successfully"]);
        } catch (QueryException $th) {
            throw $th;
        }
    }

    public function action(Request $request)
    {
        $inputs = $request->all();
        $user = User::findOrFail(Auth::user()->id);
        try {
            $user->expense()->where("id", "=", $inputs['id'])->update([
                "status" => $inputs['action']
            ]);
            return response()->json(["msg" => "Operation Successfull"]);
        } catch (QueryException $th) {
            throw $th;
        }
    }
}
