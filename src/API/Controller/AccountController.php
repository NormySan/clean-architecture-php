<?php

declare(strict_types=1);

namespace Clean\API\Controller;

use Clean\Application\Account\Command\RegisterUserCommand;
use Clean\Application\Common\Mediator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class AccountController
{
    public function __construct(
        private Mediator $mediator,
        private ValidatorInterface $validator,
    ) {}

    public function register(Request $request): Response
    {
        $constraints = new Assert\Collection([
            'email' => [new Assert\Email()],
            'password' => [new Assert\NotBlank()],
        ]);

        $this->validator->validate($request->request->all(), $constraints);

        $id = $this->mediator->send(
            new RegisterUserCommand(
                email: $request->request->get('email'),
                password: $request->request->get('password'),
            ),
        );

        return new JsonResponse([
            'id' => $id,
        ]);
    }
}
