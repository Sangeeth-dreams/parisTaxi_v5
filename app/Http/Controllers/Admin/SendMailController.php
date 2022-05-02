<?php

namespace app\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Mail\MyTestMail;//access MyTestMail.php 
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Tours;//access Tours.php
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class SendMailController extends Controller
{
    
    public function sendMail(Request $request){

//==========================Get Tour================================
        $tour = Tours::where('id', '=', '1')
        ->select('customer_name')
        ->get();

//==================================================================

//==========================
       // return $tour;
        //return $tour->customer_name;
//dd($tour);

       // $data = $tour->customer_name;
//return $data;
        //dd($data);
        
    //dd("New route.");


            
    $details = [
        'title' => 'This is a Test Mail genereated to test mail',
        'body' => 'Trying to get Place controller and Tour controller',
        'Customer_name' => $tour,
    ];

   
    Mail::to('sangeethsrihari789@gmail.com')->send(new MyTestMail($details));
   
    dd("Email is Sent.");

    }

    // public function index()
    // {
    //     return Tours::where('deleted', '=', '0')->get();

    // }
}
