<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain;

use Termyn\Ddd\DomainFailure;

final class MismatchCurrencies extends DomainFailure
{
    public function __construct(Money $origin, Money $another)
    {
        parent::__construct(
            message: vsprintf('Mathematical operations are allowed for only the same currency (%s => %s).', [
                $origin->currency->code(),
                $another->currency->code(),
            ]),
            code: 405,
        );
    }
}
