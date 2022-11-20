<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Application\Transformer\Id;

use Termyn\Identifier\Uuid;
use Termyn\SharedKernel\Domain\Id;

interface IdTransformer
{
    public function transform(Uuid $uuid): Id;
}