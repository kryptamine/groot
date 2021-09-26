<?php

namespace Kryptamine\Groot\Tests\TestControllers;

use Kryptamine\Groot\Attributes\Post;

class PostTestController
{
    #[Post('save-user')]
    public function saveUser(): void
    {

    }
}
