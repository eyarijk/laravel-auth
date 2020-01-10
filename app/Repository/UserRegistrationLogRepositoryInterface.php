<?php

namespace App\Repository;

use App\Models\User;
use App\Models\UserRegistrationLog;

interface UserRegistrationLogRepositoryInterface
{
    /**
     * @param User $user
     * @param \DateTimeInterface $dateTime
     * @return UserRegistrationLog
     */
    public function create(User $user, \DateTimeInterface $dateTime): UserRegistrationLog;
}
