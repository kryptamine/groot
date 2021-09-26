<?php

namespace Kryptamine\Groot\Tests;

use Kryptamine\Groot\Attributes\HttpMethods;
use Kryptamine\Groot\Tests\TestControllers\MultipleRoutesController;

class RouterTest extends TestCase
{
    /**
     * @test
     */
    public function itRegistersRouteMapCorrectly(): void
    {
        $this
            ->registerRoute(MultipleRoutesController::class)
            ->setPath('users')
            ->assertRoutesCount(5)
            ->assertRouteRegistered(
                methods: [HttpMethods::GET],
                route: '/',
                handler: [MultipleRoutesController::class, 'getUsers']
            )
            ->assertRouteRegistered(
                methods: [HttpMethods::GET],
                route: '/{id:\d+}',
                handler: [MultipleRoutesController::class, 'getUser']
            )
            ->assertRouteRegistered(
                methods: [HttpMethods::PUT],
                route: '/{id:\d+}',
                handler: [MultipleRoutesController::class, 'updateUser']
            )
            ->assertRouteRegistered(
                methods: [HttpMethods::DELETE],
                route: '/{id:\d+}',
                handler: [MultipleRoutesController::class, 'deleteUser']
            )
            ->assertRouteRegistered(
                methods: [HttpMethods::POST],
                route: '/',
                handler: [MultipleRoutesController::class, 'saveUser']
            );
    }
}
