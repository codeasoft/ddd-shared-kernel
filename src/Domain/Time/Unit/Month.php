<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain\Time\Unit;

use DateTimeImmutable;
use Termyn\SharedKernel\Domain\Assert;
use Termyn\SharedKernel\Domain\Time\TimeUnit;

final class Month extends TimeUnit
{
    public const SECONDS_PER_MONTH = 2629743;

    public function __construct(int $value)
    {
        Assert::range(
            value: $value,
            min: 1,
            max: Year::MONTHS_PER_YEAR,
            message: 'The month of the year is out of the range (from %2$s to %3$s), "%s" given.'
        );

        parent::__construct($value);
    }

    public static function by(
        DateTimeImmutable $dateTime
    ): self {
        return new self(
            intval($dateTime->format('n'))
        );
    }
}
