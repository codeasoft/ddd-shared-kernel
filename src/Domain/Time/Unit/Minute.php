<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain\Time\Unit;

use DateTimeImmutable;
use Termyn\SharedKernel\Domain\Assert;
use Termyn\SharedKernel\Domain\Time;
use Termyn\SharedKernel\Domain\Time\TimeUnit;

final class Minute extends TimeUnit
{
    public function __construct(int $value)
    {
        Assert::range(
            value: $value,
            min: 0,
            max: Time::MINUTES_IN_HOUR - 1,
            message: 'The minute of the hour is out of the range (from %2$s to %3$s), "%s" given.',
        );

        parent::__construct($value);
    }

    public static function by(
        DateTimeImmutable $dateTime
    ): self {
        return new self(
            intval($dateTime->format('i'))
        );
    }
}
