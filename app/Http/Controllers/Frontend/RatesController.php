<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RatesController extends Controller
{
    public function oneway(){
        return view('frontend.rates.oneway');
    }
}
