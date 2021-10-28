<?php

declare(strict_types=1);

namespace Clean\Application\Account;

use Stringable;

class HashedPassword implements Stringable {
  public string $value;

  public function __construct(string $password)
  {
    $this->value = password_hash($password, PASSWORD_DEFAULT);
  }

  public function __toString(): string
  {
    return $this->value;
  }
}
