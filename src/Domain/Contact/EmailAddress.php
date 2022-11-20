<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain\Contact;

use Termyn\SharedKernel\Domain\Assert;

final class EmailAddress
{
    public function __construct(
        private readonly string $value,
    ) {
        Assert::email(
            value: $this->value,
            message: 'Email address "%s" is not valid',
        );

        Assert::maxLength(
            value: $this->value,
            max: 100,
            message: 'Email address "%s" is too long. Expected an email address to contain at most %2$s characters.'
        );
    }
}