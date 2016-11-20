<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;

class SQLInjectionController extends Controller
{
    public function inject(Request $request){

        $user_id = $request->user_id;

        $products = Product::all();

        $results = DB::select(

        DB::raw("SELECT * FROM users WHERE id = $user_id"));

        return view('home', compact('results', 'products'));

    }
}
