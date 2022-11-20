<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Infrastructure\Model\Id;

use Termyn\Identifier\Uuid;
use Termyn\SharedKernel\Domain\Id;

final class TermynUuid implements Id
{
    public function __construct(
        private readonly Uuid $uuid
    ) {

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