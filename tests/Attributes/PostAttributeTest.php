<?php

namespace Kryptamine\Groot\Tests\Attributes;

use Kryptamine\Groot\Attributes\HttpMethods;
use Kryptamine\Groot\Tests\TestCase;
use Kryptamine\Groot\Tests\TestControllers\PostTestController;

class PostAttributeTest extends TestCase
{
    /**
     * @test
     */
    public function itRegistersPostRoute(): void
    {
        $this
            ->registerRoute(PostTestController::class)
            ->assertRouteRegistered(
                methods: [HttpMethods::POST],
                route: 'save-user',
                handler: [PostTestController::class, 'saveUser']
            );
    }
}
