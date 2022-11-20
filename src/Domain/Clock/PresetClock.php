<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain\Clock;

use Termyn\DateTime\Instant;
use Termyn\SharedKernel\Domain\Clock;
use Termyn\SharedKernel\Domain\Time\Period\Days;
use Termyn\SharedKernel\Domain\Time\Period\Hours;
use Termyn\SharedKernel\Domain\Time\Period\Minutes;
use Termyn\SharedKernel\Domain\Time\Period\Seconds;

final class PresetClock implements Clock
{
    public function __construct(
        private readonly Instant $instant
    ) {
    }

    public static function set(
        Instant $instant,
        Days|Hours|Minutes|Seconds $shift
    ): self {
        $shiftInSeconds = ($shift instanceof Seconds) ? $shift : $shift->seconds();

        return new self(
            $instant->shift($shiftInSeconds)
        );
    }

    public function instant(): Instant
    {
        return $this->instant;
    }
}
