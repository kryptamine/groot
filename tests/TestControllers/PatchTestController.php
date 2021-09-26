<?php

namespace Kryptamine\Groot\Tests\TestControllers;

use Kryptamine\Groot\Attributes\Options;
use Kryptamine\Groot\Attributes\Patch;

class PatchTestController
{
    #[Patch('users/{id:\d+}')]
    public function patchUser(): void
    {

    }
}
