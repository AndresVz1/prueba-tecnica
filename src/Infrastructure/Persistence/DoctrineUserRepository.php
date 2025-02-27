<?php

namespace Infrastructure\Persistence;

use Domain\User\Repository\UserRepositoryInterface;
use Domain\User\User;
use Domain\User\ValueObject\UserId;
use Doctrine\ORM\EntityManager;

class DoctrineUserRepository implements UserRepositoryInterface
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(User $user): void
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function findById(UserId $id): ?User
    {
        return $this->entityManager->find(User::class, $id);
    }

    public function delete(UserId $id): void
    {
        $user = $this->findById($id);
        if ($user) {
            $this->entityManager->remove($user);
            $this->entityManager->flush();
        }
    }
}
