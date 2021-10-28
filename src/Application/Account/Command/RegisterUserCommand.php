<?php

declare(strict_types=1);

namespace Clean\Application\Account\Command;

use Clean\Application\Common\Command;

class RegisterUserCommand implements Command {
    public function __construct(
        public string $email,
        public string $password,
    ) {}
}
