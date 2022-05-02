<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class ContactController extends Controller
{
    function index(){
        return view('email.index');
    }

    function send(Request $request){

        $name = $request -> name;
        $email = $request -> email;
        $subject = $request -> subject;
        $message = $request -> message;
    }
}
