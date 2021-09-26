<?php

namespace Kryptamine\Groot\Tests\Attributes;

use Kryptamine\Groot\Attributes\HttpMethods;
use Kryptamine\Groot\Tests\TestCase;
use Kryptamine\Groot\Tests\TestControllers\PutTestController;

class PutAttributeTest extends TestCase
{
    /**
     * @test
     */
    public function itRegistersPutRoute(): void
    {
        $this
            ->registerRoute(PutTestController::class)
            ->assertRouteRegistered(
                methods: [HttpMethods::PUT],
                route: 'users/{id:\d+}',
                handler: [PutTestController::class, 'updateUser']
            );
    }
}
