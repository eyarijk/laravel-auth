<?php

namespace App\Listeners;

use App\Models\User;
use App\Repository\UserRegistrationLogRepositoryInterface;
use Illuminate\Auth\Events\Registered;

class UserRegistrationLogListener
{
    /**
     * @var UserRegistrationLogRepositoryInterface
     */
    private $userRegistrationLogRepository;

    /**
     * UserRegistrationLogListener constructor.
     * @param UserRegistrationLogRepositoryInterface $userRegistrationLogRepository
     */
    public function __construct(UserRegistrationLogRepositoryInterface $userRegistrationLogRepository)
    {
        $this->userRegistrationLogRepository = $userRegistrationLogRepository;
    }

    /**
     * @param Registered $event
     */
    public function handle(Registered $event): void
    {
        $now = new \DateTime();

        /** @var User $user */
        $user = $event->user;

        $this->userRegistrationLogRepository->create($user, $now);
    }
}
