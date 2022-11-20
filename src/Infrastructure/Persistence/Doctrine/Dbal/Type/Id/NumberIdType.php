<?php

declare(strict_types=1);

namespace Codea\SharedKernel\Infrastructure\Doctrine\Dbal\Type\Id;

use Codea\SharedKernel\Domain\Id\Nid;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\IntegerType;

final class NumberIdType extends IntegerType
{
    public const NAME = 'termyn.shared_kernel.nid';

    public function convertToDatabaseValue($value, AbstractPlatform $platform): int
    {
        return ($value instanceof Nid)
            ? $value->value
            : throw ConversionException::conversionFailed($value, self::NAME);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): Nid
    {
        if (! is_numeric($value)) {
            throw ConversionException::conversionFailed($value, self::NAME);
        }

        return new Nid((int) $value);
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
