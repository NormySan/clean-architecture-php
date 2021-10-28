<?php

declare(strict_types=1);

namespace Clean\Application\Common;

/**
 * @template TEntity
 */
interface Repository
{
    /**
     * @return TEntity|null
     */
    public function getById(int $id): ?Entity;

    /**
     * @param TEntity $entity
     */
    public function add($entity);
}
