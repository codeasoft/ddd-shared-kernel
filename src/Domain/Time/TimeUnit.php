<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain\Time;

use DateTimeImmutable;

abstract class TimeUnit
{
    public function __construct(
        public readonly int $value
    ) {
    }

    public function equals(self $that): bool
    {
        return $this::class === $that::class && $that->value === $this->value;
    }

    abstract public static function by(
        DateTimeImmutable $dateTime
    ): self;
}
