<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain\Person;

use Termyn\SharedKernel\Domain\Assert;

final class Forename
{
    public function __construct(
        private readonly string $value,
    ) {
        Assert::maxLength(
            value: $this->value,
            max: 25,
            message: 'Forename "%s" is too long. Expected a forename to contain at most %2$s characters.'
        );
    }
}