<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Application\Transformer\Id;

use Termyn\SharedKernel\Domain\Id\AggregateId;

interface AggregateIdTransformer
{
    public function transform(Id $uuid): AggregateId;
}