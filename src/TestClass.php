<?php

namespace Kryptamine\Groot;

use Kryptamine\Groot\Attributes\Controller;
use Kryptamine\Groot\Attributes\Get;
use Kryptamine\Groot\Attributes\Post;

#[Controller('/api')]
class TestClass
{
    #[Get('/users')]
    public function getAll()
    {

        var_dump(123);
    }

    #[Post('/users')]
    public function postUsers()
    {

        var_dump(1234);
    }
}
