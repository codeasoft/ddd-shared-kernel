<?php

declare(strict_types=1);

namespace Codea\Ddd\SharedKernel\Test\Infrastructure\Doctrine\Dbal\Type\Id;

use Codea\Ddd\SharedKernel\Domain\Id\UniversalId;
use Codea\Ddd\SharedKernel\Infrastructure\Doctrine\Dbal\Type\Id\UniversalIdType;
use Codea\Ddd\SharedKernel\Test\Infrastructure\Doctrine\Dbal\Type\TypeTest;
use Doctrine\DBAL\Types\ConversionException;

final class UniversalIdTypeTest extends TypeTest
{
    private const UUID = 'a1506ff1-62f4-4377-a0c5-8baab8342219';

    public function testItConvertsToDatabaseValue(): void
    {
        $universalId = new UniversalId(self::UUID);
        $universalIdType = $this->getType();

        $databaseUniversalId = $universalIdType->convertToDatabaseValue(
            value: $universalId,
            platform: $this->mockPlatform(),
        );

        $this->assertSame(self::UUID, $databaseUniversalId);
    }

    public function testItThrowsExceptionIfPhpValueIsInvalid(): void
    {
        $universalIdType = $this->getType();

        $this->expectException(ConversionException::class);

        $universalIdType->convertToDatabaseValue(
            value: 'non-uuid',
            platform: $this->mockPlatform(),
        );
    }

    public function testItConvertsToValueObject(): void
    {
        $universalIdType = $this->getType();
        $universalId = $universalIdType->convertToPHPValue(
            value: self::UUID,
            platform: $this->mockPlatform()
        );

        $this->assertInstanceOf(UniversalId::class, $universalId);
    }

    public function testItThrowsExceptionIfDatabaseValueIsInvalid(): void
    {
        $universalIdType = $this->getType();

        $this->expectException(ConversionException::class);

        $universalIdType->convertToPHPValue(
            value: 'non-uuid',
            platform: $this->mockPlatform()
        );
    }

    protected function getType(): UniversalIdType
    {
        return new UniversalIdType();
    }

    protected function getTypeName(): string
    {
        return 'termyn.shared-kernel.uid';
    }
}
