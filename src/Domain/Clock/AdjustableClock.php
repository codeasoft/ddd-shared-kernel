<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain\Clock;

use Termyn\SharedKernel\Domain\Clock;
use Termyn\SharedKernel\Domain\Time\Period\Days;
use Termyn\SharedKernel\Domain\Time\Period\Hours;
use Termyn\SharedKernel\Domain\Time\Period\Minutes;
use Termyn\SharedKernel\Domain\Time\Period\Seconds;

interface AdjustableClock extends Clock
{
    public function moveClockwise(
        Days|Hours|Minutes|Seconds $by,
    ): PresetClock;

    public function moveCounterClockwise(
        Days|Hours|Minutes|Seconds $by,
    ): PresetClock;
}
