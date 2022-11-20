<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain;

interface Id
{
    public function equals(self $another): bool;

    public function value(): int|float|string;
}
