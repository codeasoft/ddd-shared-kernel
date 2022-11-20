<?php

declare(strict_types=1);

namespace Codea\SharedKernel\Infrastructure\Doctrine\Orm;

use Codea\Ddd\AggregateRoot;
use Codea\SharedKernel\Domain\Id;
use Doctrine\ORM\EntityManagerInterface as EntityManager;

abstract class DoctrineOrmAggregateRepository
{
    public function __construct(
        protected EntityManager $entityManager,
    ) {
    }

    protected function save(AggregateRoot $aggregate): void
    {
        $this->entityManager->persist($aggregate);
    }

    abstract protected function find(Id $id): ?AggregateRoot;
}
