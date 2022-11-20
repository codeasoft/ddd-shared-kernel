<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Infrastructure\System\Clock;

use Codea\Timekeeper\SystemTimeService;
use Termyn\SharedKernel\Domain\Clock;
use Termyn\SharedKernel\Domain\Instant;

final class SystemClock implements Clock
{
    public function __construct(
        private readonly SystemTimeService $timeService
    ) {
    }

    public function instant(): Instant
    {
        return Instant::of(
            $this->timeService->measure()->getTimestamp()
        );
    }
}
