<?php

declare(strict_types=1);

namespace Clean\Application\Common;

/**
 * @template TEvent
 */
interface EventHandler
{
    /**
     * @param TEvent $event
     */
    public function handle(Event $event);
}
