<?php

declare(strict_types=1);

namespace Clean\Application\Common;

interface Mailer {
  public function send(string $to, string $content);
}
