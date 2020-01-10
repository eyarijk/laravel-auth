<?php

namespace App\Repository;

use App\Models\User;
use App\Models\UserRegistrationLog;

class UserRegistrationLogRepository implements UserRegistrationLogRepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function create(User $user, \DateTimeInterface $dateTime): UserRegistrationLog
    {
        $userRegistrationLog = new UserRegistrationLog();

        $userRegistrationLog->user_id = $user->id;
        $userRegistrationLog->registered_at = $dateTime;

        $userRegistrationLog->save();

        return $userRegistrationLog;
    }
}
