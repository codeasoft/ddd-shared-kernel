<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain\DateTime;

use DateTimeImmutable;
use DateTimeZone;
use DomainException;
use Termyn\SharedKernel\Domain\DateTime;
use Termyn\SharedKernel\Domain\Instant;

final class UtcDateTime extends DateTime
{
    public static function by(DateTimeImmutable $dateTime): DateTime
    {
        $timeZoneOffsetInSeconds = $dateTime->getOffset();
        if ($timeZoneOffsetInSeconds !== 0) {
            throw new DomainException(
                sprintf('Time zone must be UTC (offset = 0 seconds), "%s" seconds given .', $timeZoneOffsetInSeconds)
            );
        }

        return new self(
            Instant::of($dateTime->getTimestamp())
        );
    }

    protected function asNative(): DateTimeImmutable
    {
        $nativeDateTime = new DateTimeImmutable(
            sprintf('@%s', $this->instant->epochSeconds->value)
        );

        return $nativeDateTime->setTimezone(
            new DateTimeZone('UTC')
        );
    }
}
