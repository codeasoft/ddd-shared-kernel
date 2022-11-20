<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain\Id;

use Termyn\SharedKernel\Domain\Id;

interface AggregateId extends Id
{
    public function identify(int|string $rank): Id;
}