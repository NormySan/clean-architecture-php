<?php

declare(strict_types=1);

namespace Clean\Application\Account\Event;

use Clean\Application\Common\Event;

class UserRegisteredEvent implements Event {
    public function __construct(
        public int $id,
        public string $email,
    ) {}
}
