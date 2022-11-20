<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain\Time\Unit;

use DateTimeImmutable;
use Termyn\SharedKernel\Domain\Assert;
use Termyn\SharedKernel\Domain\Time\TimeUnit;

final class Day extends TimeUnit
{
    public const SECONDS_PER_DAY = 86400;

    public const MINUTES_PER_DAY = 1440;

    public const HOURS_PER_DAY = 24;

    public function __construct(int $value)
    {
        Assert::range(
            value: $value,
            min: 1,
            max: 31,
            message: 'The day of the month is out of the range (from %2$s to %3$s), "%s" given.',
        );

        parent::__construct($value);
    }

    public static function by(
        DateTimeImmutable $dateTime
    ): self {
        return new self(
            intval($dateTime->format('d'))
        );
    }
}
