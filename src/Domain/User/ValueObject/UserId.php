<?php

namespace Domain\User\ValueObject;

use Ramsey\Uuid\Uuid;
use InvalidArgumentException;

final class UserId
{
    private string $id;

    public function __construct(?string $id = null)
    {
        if ($id === null) {
            $this->id = Uuid::uuid4()->toString(); // Genera un UUID v4
        } elseif (!Uuid::isValid($id)) {
            throw new InvalidArgumentException("ID de usuario inválido.");
        } else {
            $this->id = $id;
        }
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function equals(UserId $otherId): bool
    {
        return $this->id === $otherId->getId();
    }
}
