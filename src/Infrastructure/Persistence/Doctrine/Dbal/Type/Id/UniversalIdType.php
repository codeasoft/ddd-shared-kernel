<?php

declare(strict_types=1);

namespace Codea\SharedKernel\Infrastructure\Doctrine\Dbal\Type\Id;

use Codea\SharedKernel\Domain\Id\Uid;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\GuidType;

final class UniversalIdType extends GuidType
{
    public const NAME = 'termyn.shared_kernel.uid';

    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        return ($value instanceof Uid)
            ? $value->value
            : throw ConversionException::conversionFailed($value, self::NAME);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): Uid
    {
        if (! is_string($value) || ! preg_match('{^[0-9a-f]{8}(?:-[0-9a-f]{4}){3}-[0-9a-f]{12}$}Di', $value)) {
            throw ConversionException::conversionFailed($value, self::NAME);
        }

        return new Uid($value);
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
