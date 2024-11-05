<?php

namespace App\Mail;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AppointmentCreated extends Mailable
{
    public $appointment;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        if ($this->appointment->created_by === $this->appointment->user_id) {
            // Send to user
            return $this->subject('Appointment Created')
                ->view('emails.appointment_created'); // The original view for user
        } else {
            // Send to customer
            // return $this->subject('Your Appointment Details')
            //     ->view('emails.customer_appointment_created'); // New view for customer

            return $this->markdown('emails.customer_appointment_created');
        }
    }





    // return $this->markdown('emails.appointment-created')
    // ->subject('New Appointment Created');

    // return $this->view('emails.appointment-created')
    // ->subject('New Appointment Created');



    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
