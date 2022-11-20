<?php

declare(strict_types=1);

namespace Codea\Ddd\SharedKernel\Test\Domain\Clock;

use Codea\Ddd\SharedKernel\Domain\Clock\PresetClock;
use Codea\Ddd\SharedKernel\Domain\Instant;
use PHPUnit\Framework\TestCase;

final class PresetClockTest extends TestCase
{
    private const TIMESTAMP = 1652974976;

    public function testItMeasuresTime(): void
    {
        $clock = new PresetClock(
            Instant::of(self::TIMESTAMP)
        );

        $instant = $clock->instant();

        $this->assertSame(self::TIMESTAMP, $instant->epochSeconds->value);
    }
}
