<?php

namespace DeveloperHouse\Rocket\Http\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailPasswordMail extends Mailable {

    use Queueable, SerializesModels;

    public string $names;
    public string $token;

    public function __construct(string $names, string $token) {
        $this->names = $names;
        $this->token = $token;
    }

    public function build(): self {
        return $this->from(config('rocket.email.from.username'))
            ->subject(trans('rocket::password.email.subject'))
            ->view('rocket::mail.email-password')
            ->with([
                'names' => $this->names,
                'token' => $this->token,
            ]);
    }
}