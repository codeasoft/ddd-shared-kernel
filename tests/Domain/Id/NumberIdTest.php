<?php

declare(strict_types=1);

namespace Codea\Ddd\SharedKernel\Test\Domain\Id;

use Codea\Ddd\SharedKernel\Domain\Id\NumberId;
use PHPUnit\Framework\TestCase;
use Webmozart\Assert\InvalidArgumentException;

final class NumberIdTest extends TestCase
{
    private const ID = 1;

    /**
     * @dataProvider provideInvalidIds
     */
    public function testItThrowsExceptionIfValueIsNotValid(int $value): void
    {
        $this->expectException(InvalidArgumentException::class);

        new NumberId($value);
    }

    public function provideInvalidIds(): array
    {
        return [
            'zero' => [0],
            'negative' => [-1],
        ];
    }

    public function testItReturnsValidString(): void
    {
        $validId = new NumberId(self::ID);

        $this->assertSame(self::ID, $validId->value);
        $this->assertSame(self::ID, $validId->value());
        $this->assertSame(sprintf('%s', self::ID), $validId->__toString());
    }
}
