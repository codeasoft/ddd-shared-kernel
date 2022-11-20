<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain;

use Termyn\SharedKernel\Domain\Currency\Unit\Subunit;
use Termyn\SharedKernel\Domain\Currency\Unit\Superunit;

abstract class Currency
{
    public function __construct(
        public readonly Superunit $mainUnit,
        public readonly Subunit $subunit,
    ) {
    }

    public function equals(self $that): bool
    {
        return $this->mainUnit->equals($that->mainUnit)
            && $this->subunit->equals($that->subunit);
    }

    public function code(): string
    {
        return $this->mainUnit->code;
    }

    public function fraction(): int
    {
        return $this->subunit->fraction;
    }

    public function precision(): int
    {
        return $this->subunit->precision();
    }
}
