<?php

declare(strict_types=1);

namespace Clean\Infrastructure;

use Clean\Application\Account\User;
use Clean\Application\Account\UserRepository;
use Clean\Application\Common\Entity;

class InMemoryUserRepository implements UserRepository
{
    /**
     * @var User[]
     */
    private array $users = [];

    public function add(Entity $entity)
    {
        $this->users[] = $entity;
    }

    /**
     * @return User|null
     */
    public function getById(int $id): ?Entity
    {
        foreach ($this->users as $user) {
            if ($user->id === $id) {
                return $user;
            }
        }

        return null;
    }
}
