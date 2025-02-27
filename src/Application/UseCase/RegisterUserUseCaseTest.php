<?php

namespace Tests\Application\UseCase;

use Application\UseCase\RegisterUserUseCase;
use Application\DTO\RegisterUserRequest;
use Domain\User\Repository\UserRepositoryInterface;
use Domain\User\User;
use Domain\User\ValueObject\UserId;
use Domain\User\ValueObject\Email;
use Domain\User\ValueObject\Name;
use Domain\User\ValueObject\Password;
use PHPUnit\Framework\TestCase;

class RegisterUserUseCaseTest extends TestCase
{
    private UserRepositoryInterface $userRepository;
    private RegisterUserUseCase $registerUserUseCase;

    protected function setUp(): void
    {
        $this->userRepository = $this->createMock(UserRepositoryInterface::class);
        $this->registerUserUseCase = new RegisterUserUseCase($this->userRepository);
    }

    public function testRegisterUserSuccessfully(): void
    {
        $request = new RegisterUserRequest("1", "John Doe", "john@example.com", "securepassword");

        $this->userRepository
            ->expects($this->once())
            ->method('save')
            ->willReturnCallback(function (User $user) {
                $this->assertEquals("John Doe", $user->getName());
                $this->assertEquals("john@example.com", $user->getEmail());
            });

        $this->userRepository
            ->expects($this->once())
            ->method('findById')
            ->willReturn(null); // Simulate that the user does not exist

        $userResponse = $this->registerUserUseCase->execute($request);

        $this->assertEquals("John Doe", $userResponse->toArray()['name']);
        $this->assertEquals("john@example.com", $userResponse->toArray()['email']);
    }

    public function testRegisterUserWithExistingEmail(): void
    {
        $request = new RegisterUserRequest("1", "John Doe", "john@example.com", "securepassword");

        $existingUser = new User(
            new UserId("1"),
            new Name("Existing User"),
            new Email("john@example.com"),
            new Password("securepassword")
        );

        $this->userRepository
            ->expects($this->once())
            ->method('findById')
            ->willReturn(null); // Simulate that the user does not exist

        $this->userRepository
            ->expects($this->once())
            ->method('findAll')
            ->willReturn([$existingUser]); // Simulate existing user with the same email

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("El email ya está en uso.");

        $this->registerUserUseCase->execute($request);
    }
}
