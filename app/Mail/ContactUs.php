<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;
     protected $mailData ;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData)
    {
    
      $this->mailData = $mailData;

    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address($this->mailData['email'] , $this->mailData['name']),
            subject: $this->mailData['subject'],
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            
            
            markdown: 'mail',
            with:[
            'message'=> $this->mailData['message'],
            'name'=> $this->mailData['name'],
            'subject'=> $this->mailData['subject'],
            'email'=> $this->mailData['email']
            ]
            
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
