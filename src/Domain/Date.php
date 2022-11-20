<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain;

use DateTimeImmutable;
use Termyn\SharedKernel\Domain\Time\Unit\Day;
use Termyn\SharedKernel\Domain\Time\Unit\DayOfWeek;
use Termyn\SharedKernel\Domain\Time\Unit\Month;
use Termyn\SharedKernel\Domain\Time\Unit\WeekInYear;
use Termyn\SharedKernel\Domain\Time\Unit\Year;

final class Date
{
    public const SECONDS_PER_YEAR = 31556926;

    public const MONTHS_PER_YEAR = 12;

    public function __construct(
        public readonly Year $year,
        public readonly Month $month,
        public readonly WeekInYear $week,
        public readonly DayOfWeek $dayOfWeek,
        public readonly Day $day,
    ) {
    }

    public static function by(
        DateTimeImmutable $dateTime
    ): self {
        return new self(
            Year::by($dateTime),
            Month::by($dateTime),
            WeekInYear::by($dateTime),
            DayOfWeek::by($dateTime),
            Day::by($dateTime),
        );
    }
}
