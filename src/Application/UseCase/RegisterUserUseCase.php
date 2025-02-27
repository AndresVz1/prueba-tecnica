<?php

namespace Application\UseCase;

use Domain\User\Repository\UserRepositoryInterface;
use Domain\User\User;
use Domain\User\ValueObject\UserId;
use Domain\User\ValueObject\Email;
use Domain\User\ValueObject\Name;
use Domain\User\ValueObject\Password;
use Domain\User\Event\UserRegisteredEvent;
use Application\DTO\RegisterUserRequest;
use Application\Event\EventDispatcherInterface;

class RegisterUserUseCase
{
    private UserRepositoryInterface $userRepository;
    private EventDispatcherInterface $eventDispatcher;

    public function __construct(
        UserRepositoryInterface $userRepository,
        EventDispatcherInterface $eventDispatcher
    ) {
        $this->userRepository = $userRepository;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function execute(RegisterUserRequest $request): void
    {
        // Validar si el email ya está registrado
        if ($this->userRepository->findById(new UserId($request->id))) {
            throw new \Exception("El usuario con este ID ya existe.", 400);
        }

        // Check if the email is already in use
        foreach ($this->userRepository->findAll() as $existingUser) {
            if ($existingUser->getEmail()->equals(new Email($request->email))) {
                throw new \Exception("El email ya está en uso.", 400);
            }
        }

        // Crear el objeto User
        $user = new User(
            new UserId($request->id),
            new Name($request->name),
            new Email($request->email),
            new Password($request->password),
            new \DateTimeImmutable()
        );

        // Guardar el usuario en el repositorio
        $this->userRepository->save($user);

        // Disparar evento de usuario registrado
        $this->eventDispatcher->dispatch(new UserRegisteredEvent($user));
    }
}
