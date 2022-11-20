<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Application;

use Termyn\Identifier\Uuid;

final class RegisterUser
{
    public function __construct(
        public readonly Uuid $id,
    ) {

    }
}