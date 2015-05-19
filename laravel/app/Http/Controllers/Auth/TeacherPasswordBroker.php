<?php namespace App\Http\Controllers\Auth;

use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Auth\Passwords\TokenRepositoryInterface;
use Illuminate\Contracts\Mail\Mailer as MailerContract;

class TeacherPasswordBroker extends PasswordBroker {
    
    public function __construct(TokenRepositoryInterface $tokens,
                                TeacherProvider $users,
                                MailerContract $mailer)
    {
        parent::__construct(
            $tokens,
            $users,
            $mailer,
            env('auth.password.email')
        );
    }
}
