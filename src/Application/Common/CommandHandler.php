<?php

declare(strict_types=1);

namespace Clean\Application\Common;

/**
 * @template TCommand
 * @template TReturn = mixed
 */
interface CommandHandler
{
    /**
     * @param TCommand $command
     * @return TReturn
     */
    public function handle(Command $command): mixed;
}
