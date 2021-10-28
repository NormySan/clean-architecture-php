<?php

declare(strict_types=1);

namespace Clean\Application\Account\Command;

use Clean\Application\Account\Email;
use Clean\Application\Account\Event\UserRegisteredEvent;
use Clean\Application\Account\HashedPassword;
use Clean\Application\Account\User;
use Clean\Application\Account\UserRepository;
use Clean\Application\Common\Command;
use Clean\Application\Common\CommandHandler;
use Clean\Application\Common\Mediator;

/**
 * @implements CommandHandler<RegisterUserCommand>
 */
class RegisterUserCommandHandler implements CommandHandler {
    public function __construct(
        private UserRepository $userRepository,
        private Mediator $mediator,
    ) {}

    /**
     * @param RegisterUserCommand $command
     */
    public function handle(Command $command): int
    {
        $user = new User(
            id: 1,
            email: new Email($command->email),
            password: new HashedPassword($command->password),
        );

        $this->userRepository->add($user);

        $this->mediator->publish(new UserRegisteredEvent($user->id, $user->email));

        return $user->id;
    }
}
