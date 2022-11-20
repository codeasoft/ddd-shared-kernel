<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Infrastructure\Model\Id;

use Termyn\Identifier\Uuid;
use Termyn\SharedKernel\Domain\Id;
use Termyn\SharedKernel\Domain\Id\AggregateId;

final class TermynAggregateUuid implements AggregateId
{
    public function __construct(
        private readonly Uuid $uuid
    ) {

    }

    public function identify(int|string $rank): Id
    {
        return
    }

    public function equals(Id $another): bool
    {
        // TODO: Implement equals() method.
    }

    public function value(): int|float|string
    {
        // TODO: Implement value() method.
    }
}