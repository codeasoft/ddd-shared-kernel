<?php

declare(strict_types=1);

namespace Codea\Ddd\SharedKernel\Test\Infrastructure\Doctrine\Dbal\Type\Id;

use Codea\Ddd\SharedKernel\Domain\Id\NumberId;
use Codea\Ddd\SharedKernel\Infrastructure\Doctrine\Dbal\Type\Id\NumberIdType;
use Codea\Ddd\SharedKernel\Test\Infrastructure\Doctrine\Dbal\Type\TypeTest;
use Doctrine\DBAL\Types\ConversionException;

final class NumberIdTypeTest extends TypeTest
{
    private const NID = 1;

    public function testItConvertsToDatabaseValue(): void
    {
        $numberId = new NumberId(self::NID);
        $numberIdType = $this->getType();

        $databaseNumberId = $numberIdType->convertToDatabaseValue(
            value: $numberId,
            platform: $this->mockPlatform(),
        );

        $this->assertSame(self::NID, $databaseNumberId);
    }

    public function testItThrowsExceptionIfPhpValueIsInvalid(): void
    {
        $numberIdType = $this->getType();

        $this->expectException(ConversionException::class);

        $numberIdType->convertToDatabaseValue(
            value: 'not-a-number',
            platform: $this->mockPlatform()
        );
    }

    public function testItConvertsToValueObject(): void
    {
        $numberIdType = $this->getType();
        $numberId = $numberIdType->convertToPHPValue(
            value: self::NID,
            platform: $this->mockPlatform(),
        );

        $this->assertInstanceOf(NumberId::class, $numberId);
    }

    public function testItThrowsExceptionIfDatabaseValueIsInvalid(): void
    {
        $numberIdType = $this->getType();

        $this->expectException(ConversionException::class);

        $numberIdType->convertToPHPValue(
            value: 'not-a-number',
            platform: $this->mockPlatform()
        );
    }

    protected function getType(): NumberIdType
    {
        return new NumberIdType();
    }

    protected function getTypeName(): string
    {
        return 'termyn.shared-kernel.nid';
    }
}
