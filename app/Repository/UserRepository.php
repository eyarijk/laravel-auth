<?php

namespace App\Repository;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @inheritdoc
     */
    public function findByEmail(string $email): ?User
    {
        /** @var User $user */
        $user = User::query()
            ->where('email','=', $email)
            ->whereNotNull('email_verified_at')
            ->first()
        ;

        return $user;
    }

    /**
     * @inheritdoc
     */
    public function create(array $data): User
    {
        $user = new User();

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];

        $user->save();

        return $user;
    }
}
