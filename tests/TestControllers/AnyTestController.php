<?php

namespace Kryptamine\Groot\Tests\TestControllers;

use Kryptamine\Groot\Attributes\Any;

class AnyTestController
{
    #[Any('any-route')]
    public function anyRoute(): void
    {

    }
}
