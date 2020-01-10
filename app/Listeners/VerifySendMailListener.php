<?php

namespace App\Listeners;

use App\Components\VerificationHashTokenComponent;
use App\Mail\VerifyMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;

class VerifySendMailListener
{
    /**
     * @var VerificationHashTokenComponent
     */
    private $verificationHashTokenComponent;

    /**
     * VerifySendMailListener constructor.
     * @param VerificationHashTokenComponent $verificationHashTokenComponent
     */
    public function __construct(VerificationHashTokenComponent $verificationHashTokenComponent)
    {
        $this->verificationHashTokenComponent = $verificationHashTokenComponent;
    }

    /**
     * @param Registered $event
     */
    public function handle(Registered $event): void
    {
        /** @var User $user */
        $user = $event->user;

        $token = $this->verificationHashTokenComponent->make($user);

        Mail::to($user->email)->send(new VerifyMail($user, $token));
    }
}
