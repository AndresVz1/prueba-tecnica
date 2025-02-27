<?php

namespace Domain\User\ValueObject;

use InvalidArgumentException;

final class Password
{
    private string $password;

    public function __construct(string $password)
    {
        $this->validatePassword($password);
        $this->password = $password;
    }

    private function validatePassword(string $password): void
    {
        if (strlen($password) < 8) {
            throw new InvalidArgumentException("La contraseña debe tener al menos 8 caracteres.");
        }

        if (!preg_match('/[A-Z]/', $password)) {
            throw new InvalidArgumentException("La contraseña debe contener al menos una letra mayúscula.");
        }

        if (!preg_match('/\d/', $password)) {
            throw new InvalidArgumentException("La contraseña debe contener al menos un número.");
        }
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
