<?php

namespace Kryptamine\Groot\Tests\Attributes;

use Kryptamine\Groot\Attributes\HttpMethods;
use Kryptamine\Groot\Tests\TestCase;
use Kryptamine\Groot\Tests\TestControllers\PatchTestController;

class PatchAttributeTest extends TestCase
{
    /**
     * @test
     */
    public function itRegistersPatchRoute(): void
    {
        $this
            ->registerRoute(PatchTestController::class)
            ->assertRouteRegistered(
                methods: [HttpMethods::PATCH],
                route: 'users/{id:\d+}',
                handler: [PatchTestController::class, 'patchUser']
            );
    }
}
