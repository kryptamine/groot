<?php

namespace Kryptamine\Groot\Tests\TestControllers;

use Kryptamine\Groot\Attributes\Put;

class PutTestController
{
    #[Put('users/{id:\d+}')]
    public function updateUser(): void
    {

    }
}
