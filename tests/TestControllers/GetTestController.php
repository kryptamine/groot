<?php

namespace Kryptamine\Groot\Tests\TestControllers;

use Kryptamine\Groot\Attributes\Get;

class GetTestController
{
    #[Get('get-users')]
    public function getUsers(): void
    {

    }
}
