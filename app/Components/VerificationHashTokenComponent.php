<?php

namespace App\Components;

use App\Models\User;
use Illuminate\Contracts\Hashing\Hasher;

class VerificationHashTokenComponent
{
    /**
     * @var Hasher
     */
    private $hasher;

    /**
     * VerificationHashTokenComponent constructor.
     * @param Hasher $hasher
     */
    public function __construct(Hasher $hasher)
    {
        $this->hasher = $hasher;
    }

    /**
     * @param User $user
     * @return string
     */
    public function make(User $user): string
    {
        $salt = config('services.hash_salt');

        return $this->hasher->make($salt . $user->email . $user->id);
    }

    /**
     * @param User $user
     * @param string $token
     * @return string
     */
    public function check(User $user, string $token): string
    {
        return $this->hasher->check($this->make($user), $token);
    }
}
