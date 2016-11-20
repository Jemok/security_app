<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CrossScriptingController extends Controller
{

    public function store(Request $request){

        Product::create([
            'product_name' => $request->product_name,
            'quantity'     => $request->quantity,
            'price'        => $request->price
        ]);

        return redirect()->back();

    }

}
