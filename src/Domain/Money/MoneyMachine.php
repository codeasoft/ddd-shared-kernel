<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain\Money;

use Termyn\SharedKernel\Domain\Currency;
use Termyn\SharedKernel\Domain\Money;

final class MoneyMachine
{
    /**
     * @var array<string, Currency>
     */
    private readonly array $currencies;

    public function __construct(
        Currency ...$currencies
    ) {
        foreach ($currencies as $currency) {
            $this->currencies[$currency->code()] = $currency;
        }
    }

    public function supports(
        string $currencyCode,
    ): bool {
        return array_key_exists($currencyCode, $this->currencies);
    }

    public function denominate(
        int|float $amount,
        string $currencyCode,
    ) {
        $currency = $this->currencies[$currencyCode]
            ?? throw new CurrencyIsNotSupported();

        return Money::of(
            amount: $amount,
            currency: clone $currency,
        );
    }
}