<?php

declare(strict_types=1);

namespace Termyn\SharedKernel\Application;

use Termyn\SharedKernel\Application\Transformer\Id\IdTransformer;

final class RegisterUserHandler
{
    public function __construct(
        private readonly IdTransformer $idTransformer,
    ) {

    }

    public function __invoke(RegisterUser $registerUser): void
    {
        $userId = $this->idTransformer->transform(
            $registerUser->id,
        );
    }
}