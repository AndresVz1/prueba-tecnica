<?php

namespace Domain\User;

use Domain\User\ValueObject\UserId;
use Domain\User\ValueObject\Name;
use Domain\User\ValueObject\Email;
use Domain\User\ValueObject\Password;
use DateTimeImmutable;

final class User
{
    private UserId $id;
    private Name $name;
    private Email $email;
    private Password $password;
    private DateTimeImmutable $createdAt;

    public function __construct(UserId $id, Name $name, Email $email, Password $password, ?DateTimeImmutable $createdAt = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->createdAt = $createdAt ?? new DateTimeImmutable();
    }

    public function getId(): UserId
    {
        return $this->id;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPassword(): Password
    {
        return $this->password;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }
}
