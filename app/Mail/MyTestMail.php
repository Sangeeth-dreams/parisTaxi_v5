<?php
  
namespace App\Mail;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
  
class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;
  
    public $details;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($details)
    {
        $this->details = $details;
    }

  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from privatetaxidisneyparis.com')
                    ->view('emails.myTestMail');
    }
}
