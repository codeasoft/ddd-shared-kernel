<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain\Time\Unit;

use DateTimeImmutable;
use Termyn\SharedKernel\Domain\Time\TimeUnit;
use Webmozart\Assert\Assert;

final class Year extends TimeUnit
{
    public const SECONDS_PER_YEAR = 31556926;

    public const MONTHS_PER_YEAR = 12;

    public const WEEKS_PER_YEAR = 53;

    public function __construct(int $value)
    {
        Assert::range(
            value: $value,
            min: 1000,
            max: 2999,
            message: 'The year is out of the range (from %2$s to %3$s), "%s" given.'
        );

        parent::__construct($value);
    }

    public function isLeap(): bool
    {
        return ($this->value & 3) === 0
            && (($this->value % 100) !== 0 || ($this->value % 400) === 0);
    }

    public static function by(
        DateTimeImmutable $dateTime
    ): self {
        return new self(
            intval($dateTime->format('o'))
        );
    }
}
