<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain\Time\Unit;

use DateTimeImmutable;
use Termyn\SharedKernel\Domain\Time\TimeUnit;
use Webmozart\Assert\Assert;

final class WeekInYear extends TimeUnit
{
    public const SECONDS_PER_WEEK = 604800;

    public const DAYS_PER_WEEK = 7;

    public function __construct(int $value)
    {
        Assert::range(
            value: $value,
            min: 1,
            max: Year::WEEKS_PER_YEAR,
            message: 'The week of the year is out of the range (from %2$s to %3$s), "%s" given.'
        );

        parent::__construct($value);
    }

    public static function by(
        DateTimeImmutable $dateTime
    ): self {
        return new self(
            intval($dateTime->format('W'))
        );
    }
}
