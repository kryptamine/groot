<?php

namespace Kryptamine\Groot\Tests\TestControllers;

use Kryptamine\Groot\Attributes\Controller;
use Kryptamine\Groot\Attributes\Delete;
use Kryptamine\Groot\Attributes\Get;
use Kryptamine\Groot\Attributes\Post;
use Kryptamine\Groot\Attributes\Put;


#[Controller('users')]
class MultipleRoutesController
{
    #[Get('/')]
    public function getUsers(): void
    {

    }

    #[Get('/{id:\d+}')]
    public function getUser(int $id): void
    {

    }

    #[Post('/')]
    public function saveUser(): void
    {

    }

    #[Put('/{id:\d+}')]
    public function updateUser(): void
    {

    }

    #[Delete('/{id:\d+}')]
    public function deleteUser(): void
    {

    }
}
