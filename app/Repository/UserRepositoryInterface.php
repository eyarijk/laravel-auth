<?php

namespace App\Repository;

use App\Models\User;

interface UserRepositoryInterface
{
    /**
     * @param string $email
     * @return User|null
     */
    public function findByEmail(string $email): ?User;

    /**
     * @param array $data
     * @return User
     */
    public function create(array $data): User;

    /**
     * @param int $id
     * @return User|null
     */
    public function find(int $id): ?User;
}
