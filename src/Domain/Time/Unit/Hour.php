<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain\Time\Unit;

use DateTimeImmutable;
use Termyn\SharedKernel\Domain\Assert;
use Termyn\SharedKernel\Domain\Time;
use Termyn\SharedKernel\Domain\Time\TimeUnit;

final class Hour extends TimeUnit
{
    public function __construct(int $value)
    {
        Assert::range(
            value: $value,
            min: 0,
            max: Time::HOURS_IN_DAY - 1,
            message: 'The hour of the day is out of the range (from %2$s to %3$s), "%s" given.',
        );

        parent::__construct($value);
    }

    public static function by(
        DateTimeImmutable $dateTime
    ): self {
        return new self(
            intval($dateTime->format('H'))
        );
    }
}
