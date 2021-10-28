<?php

declare(strict_types=1);

namespace Clean\Application\Account;

use Clean\Application\Common\Entity;
use Clean\Application\Common\Repository;

/**
 * @implements Repository<User>
 */
interface UserRepository extends Repository {
    /**
     * @return User|null
     */
    public function getById(int $id): ?Entity;
}
