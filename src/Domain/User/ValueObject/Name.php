<?php

namespace Domain\User\ValueObject;

use InvalidArgumentException;

final class Name
{
    private string $name;

    public function __construct(string $name)
    {
        $this->validateName($name);
        $this->name = $name;
    }

    private function validateName(string $name): void
    {
        if (strlen($name) < 3 || strlen($name) > 25) {
            throw new InvalidArgumentException("El nombre debe tener entre 3 y 25 caracteres.");
        }

        if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', $name)) {
            throw new InvalidArgumentException("El nombre solo puede contener letras y espacios.");
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function equals(Name $otherName): bool
    {
        return $this->name === $otherName->getName();
    }
}
