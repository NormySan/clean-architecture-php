<?php

declare(strict_types=1);

namespace Clean\Infrastructure;

use Clean\Application\Common\Mailer;
use SendGrid;

class SendgridMailer implements Mailer
{
    private SendGrid $client;

    public function __construct(array $config)
    {
        $this->client = new SendGrid($config['api_key']);
    }

    public function send(string $to, string $content)
    {
        $email = new SendGrid\Mail\Mail();

        $email->addTo($to);
        $email->addContent($content);

        $this->client->send($email);
    }
}
