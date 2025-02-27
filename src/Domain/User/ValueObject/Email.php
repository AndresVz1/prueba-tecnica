<?php

namespace Domain\User\ValueObject;

use InvalidArgumentException;

final class Email
{
    private string $email;

    public function __construct(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("El email proporcionado no es válido.");
        }

        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function equals(Email $otherEmail): bool
    {
        return $this->email === $otherEmail->getEmail();
    }
}
