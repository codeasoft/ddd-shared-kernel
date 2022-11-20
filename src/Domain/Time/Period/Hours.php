<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain\Time\Period;

use Termyn\SharedKernel\Domain\Time;
use Termyn\SharedKernel\Domain\Time\TimePeriod;

final class Hours extends TimePeriod
{
    public static function fromDays(
        Days $days
    ): self {
        return new self($days->value * Time::HOURS_IN_DAY);
    }

    public static function fromMinutes(
        Minutes $minutes
    ): self {
        return new self(
            intdiv($minutes->value, Time::MINUTES_IN_HOUR)
        );
    }

    public static function fromSeconds(
        Seconds $seconds
    ): self {
        return new self(
            intdiv($seconds->value, Time::SECONDS_IN_HOUR)
        );
    }

    public function days(): Days
    {
        return Days::fromHours($this);
    }

    public function minutes(): Minutes
    {
        return Minutes::fromHours($this);
    }

    public function seconds(): Seconds
    {
        return Seconds::fromHours($this);
    }
}
