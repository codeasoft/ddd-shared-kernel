<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain\Money;

use Termyn\Ddd\DomainFailure;
use Termyn\SharedKernel\Domain\Currency;

final class CurrencyIsNotSupported extends DomainFailure
{
    public function __construct(
        string $currencyCode,
    ) {
        parent::__construct(
            message: vsprintf('Currency "%s" is currently not supported. Add it by implementing the interface %s', [
                $currencyCode,
                Currency::class,
            ]),
            code: 501,
        );
    }
}