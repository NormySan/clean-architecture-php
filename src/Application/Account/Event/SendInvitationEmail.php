<?php

declare(strict_types=1);

namespace Clean\Application\Account\Event;

use Clean\Application\Common\Mailer;
use Clean\Application\Common\Event;
use Clean\Application\Common\EventHandler;

/**
 * @implements EventHandler<UserRegisteredEvent>
 */
class SendInvitationEmail implements EventHandler
{
    public function __construct(
        private Mailer $email,
    ) {}

    /**
     * @param UserRegisteredEvent $event
     */
    public function handle(Event $event)
    {
        $this->email->send($event->email, 'Welcome to our awesome app.');
    }
}
