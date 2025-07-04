<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;

    /**
     * Create a new message instance.
     */
    public function __construct($details = [])
    {
        $this->details = $details;
    }

    public function build() {
        return $this->subject('Mail from ZanaEMS Application')
                    ->view('admin.email.sendmail')
                    ->attach($this->details['file']->getRealPath(), [
                        'as' => $this->details['file']->getClientOriginalName(),
                        'mime' => $this->details['file']->getClientMimeType(),
                    ]);
    }

    // public function __invoke() {
    //     $this->subject('Mail from ZanaEMS Application!')
    //          ->view('admin.email.sendmail')
    //          ->attach();
    // }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Mail',
        );
    }

    // /**
    //  * Get the message content definition.
    //  */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

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
