<?php

declare(strict_types=1);

namespace Codea\SharedKernel\Infrastructure\System\Clock;

use Codea\SharedKernel\Domain\Clock\AdjustableClock;
use Codea\SharedKernel\Domain\Clock\PresetClock;
use Codea\SharedKernel\Domain\Instant;
use Codea\SharedKernel\Domain\Time\Period\Days;
use Codea\SharedKernel\Domain\Time\Period\Hours;
use Codea\SharedKernel\Domain\Time\Period\Minutes;
use Codea\SharedKernel\Domain\Time\Period\Seconds;

final class SystemAdjustableClock implements AdjustableClock
{
    public function __construct(
        private readonly SystemClock $systemClock
    ) {
    }

    public function instant(): Instant
    {
        return $this->systemClock->instant();
    }

    public function moveClockwise(
        Days|Hours|Minutes|Seconds $by,
    ): PresetClock {
        return PresetClock::set(
            instant: $this->instant(),
            shift: $by->absolute(),
        );
    }

    public function moveCounterClockwise(
        Days|Hours|Minutes|Seconds $by,
    ): PresetClock {
        return PresetClock::set(
            instant: $this->instant(),
            shift: $by->negated(),
        );
    }
}
