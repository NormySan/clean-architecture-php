<?php

declare(strict_types=1);

namespace Clean\Application\Common;

interface Mediator
{
    /**
     * Publish a event.
     */
    public function publish(Event $event): mixed;

    /**
     * Send a command.
     */
    public function send(Command $command): mixed;
}
