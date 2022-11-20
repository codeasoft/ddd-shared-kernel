<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain;

use Termyn\Ddd\ValueIsNotValid;
use Webmozart\Assert\Assert as WebmozartAssert;

final class Assert extends WebmozartAssert
{
    protected static function reportInvalidArgument($message)
    {
        throw new ValueIsNotValid($message);
    }
}
