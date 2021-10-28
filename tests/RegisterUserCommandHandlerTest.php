<?php

declare(strict_types=1);

use Clean\Application\Account\Command\RegisterUserCommand;
use Clean\Application\Account\Command\RegisterUserCommandHandler;
use Clean\Application\Account\Event\UserRegisteredEvent;
use Clean\Application\Account\UserRepository;
use Clean\Application\Common\Mediator;

it('should return the registered users id', function () {
    $userRepository = mock(UserRepository::class)->expect(
        add: function() {},
    );

    $mediator = mock(Mediator::class)->expect(
        publish: function() {},
    );

    $handler = new RegisterUserCommandHandler(
        $userRepository,
        $mediator,
    );

    $id = $handler->handle(
        new RegisterUserCommand(
            'hello@eexample.com',
            'my-secret-password-123',
        )
    );

    expect($id)->toBeInt();
});

it('should publish a user registered event', function () {
    $userRepository = mock(UserRepository::class)->expect(
        add: function() {},
    );

    $mediator = mock(Mediator::class)->expect(
        publish: function() {},
    );

    $mediator->shouldReceive('publish')
        ->with(new UserRegisteredEvent(1, 'hello@eexample.com'));

    $handler = new RegisterUserCommandHandler(
        $userRepository,
        $mediator,
    );

    $handler->handle(
        new RegisterUserCommand(
            'hello@eexample.com',
            'my-secret-password-123',
        )
    );
});
