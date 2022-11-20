<?php

declare(strict_types=1);

namespace Codea\SharedKernel\Infrastructure\Doctrine\Dbal\Type;

use Codea\SharedKernel\Domain\Instant;
use DateTimeImmutable;
use DateTimeZone;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\DateTimeTzImmutableType;

final class InstantType extends DateTimeTzImmutableType
{
    public const NAME = 'termyn.shared_kernel.instant';

    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {
        if (! $value instanceof Instant) {
            return null;
        }

        $dateTime = new DateTimeImmutable(
            sprintf('@%s', $value->epochSeconds->value)
        );

        $timeZone = new DateTimeZone('UTC');

        return $dateTime
            ->setTimezone($timeZone)
            ->format(
                $platform->getDateTimeFormatString()
            );
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?Instant
    {
        $dateTime = parent::convertToPHPValue($value, $platform);
        if (! $dateTime instanceof DateTimeImmutable) {
            return null;
        }

        return Instant::of(
            $dateTime->getTimestamp()
        );
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function getMappedDatabaseTypes(AbstractPlatform $platform): array
    {
        return [self::NAME];
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }
}
