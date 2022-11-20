<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain;

use DateTimeImmutable;
use Termyn\SharedKernel\Domain\Time\Unit\Hour;
use Termyn\SharedKernel\Domain\Time\Unit\Minute;
use Termyn\SharedKernel\Domain\Time\Unit\Second;

final class Time
{
    public const HOURS_IN_DAY = 24;

    public const MINUTES_IN_DAY = 1440;

    public const MINUTES_IN_HOUR = 60;

    public const SECONDS_IN_DAY = 86400;

    public const SECONDS_IN_HOUR = 3600;

    public const SECONDS_IN_MINUTE = 60;

    public function __construct(
        public readonly Hour $hour,
        public readonly Minute $minute,
        public readonly Second $second,
    ) {
    }

    public static function by(
        DateTimeImmutable $dateTime
    ): self {
        return new self(
            Hour::by($dateTime),
            Minute::by($dateTime),
            Second::by($dateTime),
        );
    }
}
