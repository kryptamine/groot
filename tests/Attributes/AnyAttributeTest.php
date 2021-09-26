<?php

namespace Kryptamine\Groot\Tests\Attributes;

use Kryptamine\Groot\Attributes\HttpMethods;
use Kryptamine\Groot\Tests\TestCase;
use Kryptamine\Groot\Tests\TestControllers\AnyTestController;

class AnyAttributeTest extends TestCase
{
    /**
     * @test
     */
    public function itRegistersAnyRoute(): void
    {
        $this
            ->registerRoute(AnyTestController::class)
            ->assertRouteRegistered(
                methods: HttpMethods::any(),
                route: 'any-route',
                handler: [AnyTestController::class, 'anyRoute']
            );
    }
}
