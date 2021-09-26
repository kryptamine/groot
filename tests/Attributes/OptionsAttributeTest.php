<?php

namespace Kryptamine\Groot\Tests\Attributes;

use Kryptamine\Groot\Attributes\HttpMethods;
use Kryptamine\Groot\Tests\TestCase;
use Kryptamine\Groot\Tests\TestControllers\OptionsTestController;
use Kryptamine\Groot\Tests\TestControllers\PostTestController;

class OptionsAttributeTest extends TestCase
{
    /**
     * @test
     */
    public function itRegistersOptionsRoute(): void
    {
        $this
            ->registerRoute(OptionsTestController::class)
            ->assertRouteRegistered(
                methods: [HttpMethods::OPTIONS],
                route: 'options-route',
                handler: [OptionsTestController::class, 'optionsRoute']
            );
    }
}
