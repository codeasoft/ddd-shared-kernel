<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain\Person;

use Termyn\SharedKernel\Domain\Assert;

final class Surname
{
    public function __construct(
        private readonly string $value,
    ) {
        Assert::maxLength(
            value: $this->value,
            max: 25,
            message: 'Surname "%s" is too long. Expected a surname to contain at most %2$s characters.'
        );
    }
}