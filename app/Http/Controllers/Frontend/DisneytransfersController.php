<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DisneytransfersController extends Controller
{
    public function disney(){
        return view('frontend.transfers.disneytransfers');
    }
}
