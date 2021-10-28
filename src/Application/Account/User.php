<?php

declare(strict_types=1);

namespace Clean\Application\Account;

class User {
  public int $id;

  public string $email;

  public string $password;

  public function __construct(
    int $id,
    Email $email,
    HashedPassword $password
  ) {
    $this->id = $id;
    $this->email = (string) $email;
    $this->password = (string) $password;
  }
}
