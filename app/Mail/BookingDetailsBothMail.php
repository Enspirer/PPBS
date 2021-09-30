<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingDetailsBothMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $booking_details;

    public function __construct($booking_details)
    {
        // $this->id = $id;
        $this->booking_details = $booking_details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {        
        return $this->subject('Paris Private Transfer - Booking Details')->view('frontend.mail.booking_details_both_mail');
    }
}
