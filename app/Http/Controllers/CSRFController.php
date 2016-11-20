<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CSRFController extends Controller
{
    public function delete(){

        Auth::user()->delete();

    }
}
