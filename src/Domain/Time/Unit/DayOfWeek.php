<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain\Time\Unit;

use DateTimeImmutable;
use Termyn\SharedKernel\Domain\Time\TimeUnit;
use Webmozart\Assert\Assert;

final class DayOfWeek extends TimeUnit
{
    public function __construct(int $value)
    {
        Assert::range(
            value: $value,
            min: 1,
            max: WeekInYear::DAYS_PER_WEEK,
            message: 'The day of the week is out of the range (from %2$s to %3$s), "%s" given.'
        );

        parent::__construct($value);
    }

    public static function by(
        DateTimeImmutable $dateTime
    ): self {
        return new self(
            intval($dateTime->format('N'))
        );
    }
}
