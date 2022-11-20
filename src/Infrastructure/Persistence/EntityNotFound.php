<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Infrastructure\Persistence;

use DomainException;
use Termyn\Ddd\DomainFailure;
use Termyn\SharedKernel\Domain\Id;

final class EntityNotFound extends DomainException implements DomainFailure
{
    public function __construct(
        string $entity,
        Id $id,
    ) {
        parent::__construct(
            message: sprintf('Entity "%s" with ID "%s" not found', $entity, $id->value()),
            code: 404,
        );
    }

    public function code(): int
    {
        return (int) $this->getCode();
    }

    public function message(): string
    {
        return $this->getMessage();
    }
}
