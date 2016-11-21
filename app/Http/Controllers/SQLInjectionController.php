<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;

class SQLInjectionController extends Controller
{
    public function inject(Request $request){

        $user_id = $request->user_id;

        $products = Product::all();

        $results_sql = DB::select(

        DB::raw("SELECT * FROM users WHERE id = $user_id"));

        return view('home', compact('results_sql', 'products'));

    }

    public function protectedSql(Request $request){

        $user = $request->user;


        $products = Product::all();

        $result = User::find($user);


        return view('home', compact('result', 'products'));

    }
}
