<?php

namespace App\Domain\User\ValueObject;

use InvalidArgumentException;

final class UserId
{
    private string $value;

    public function __construct(string $value)
    {
        if (!preg_match('/^[a-f0-9]{32}$/', $value)) {
            throw new InvalidArgumentException("ID inválido.");
        }
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
