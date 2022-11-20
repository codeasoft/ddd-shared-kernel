<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain\Currency;

use Termyn\SharedKernel\Domain\Currency;
use Termyn\SharedKernel\Domain\Currency\Unit\Subunit;
use Termyn\SharedKernel\Domain\Currency\Unit\Superunit;

final class Euro extends Currency
{
    public function __construct()
    {
        parent::__construct(
            new Superunit('EUR', '€'),
            new Subunit('cent', 'c', 100),
        );
    }
}
