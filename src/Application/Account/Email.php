<?php

declare(strict_types=1);

namespace Clean\Application\Account;

use Exception;
use Stringable;

class Email implements Stringable
{
    public string $value;

    public function __construct(string $email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new Exception('Invalid email address');
        }

        $this->value = $email;
    }

    public function __toString()
    {
        return $this->value;
    }
}
