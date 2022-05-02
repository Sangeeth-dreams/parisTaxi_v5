<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function arrival()
    {
        return view('frontend.book.arrival_book');

    }
}
