<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain;

interface Clock
{
    public function instant(): Instant;
}
