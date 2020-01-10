<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Mail\Mailable;

class VerifyMail extends Mailable
{
    /**
     * @var
     */
    protected $user;

    /**
     * @var string
     */
    private $token;

    /**
     * VerifyMail constructor.
     * @param User $user
     * @param string $token
     */
    public function __construct(User $user, string $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): Mailable
    {
        return $this
            ->view('emails.verify')
            ->from('example@example.com')
            ->with([
                'user' => $this->user,
                'token' => $this->token,
            ])
        ;
    }
}
