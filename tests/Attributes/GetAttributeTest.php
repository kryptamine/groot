<?php

namespace Kryptamine\Groot\Tests\Attributes;

use Kryptamine\Groot\Attributes\HttpMethods;
use Kryptamine\Groot\Tests\TestCase;
use Kryptamine\Groot\Tests\TestControllers\GetTestController;

class GetAttributeTest extends TestCase
{
    /**
     * @test
     */
    public function itRegistersGetRoute(): void
    {
        $this
            ->registerRoute(GetTestController::class)
            ->assertRouteRegistered(
                methods: [HttpMethods::GET],
                route: 'get-users',
                handler: [GetTestController::class, 'getUsers']
            );
    }
}
