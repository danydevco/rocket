<?php

namespace Danydev\Rocket\Http\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable {

    use Queueable, SerializesModels;

    public string $names;

    public function __construct(string $names) {
        $this->names = $names;
    }

    public function build(): self {
        return $this->from(config('rocket.email.from.username'))
            ->subject(trans('rocket::password.reset.subject'))
            ->view('rocket::mail.reset-password')
            ->with('names', $this->names);
    }
}