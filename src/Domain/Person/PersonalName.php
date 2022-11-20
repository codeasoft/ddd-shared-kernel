<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Domain\Person;

final class PersonalName
{
    public function __construct(
        private readonly Forename $forename,
        private readonly Surname $surname,
    ) {

    }

    public function forename(): Forename
    {
        return $this->forename;
    }

    public function surname(): Surname
    {
        return $this->surname;
    }
}