<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain\Currency;

use Termyn\SharedKernel\Domain\Currency;
use Termyn\SharedKernel\Domain\Currency\Unit\Subunit;
use Termyn\SharedKernel\Domain\Currency\Unit\Superunit;

final class UsDollar extends Currency
{
    public function __construct()
    {
        parent::__construct(
            new Superunit('USD', '$'),
            new Subunit('cent', 'c', 100),
        );
    }
}
