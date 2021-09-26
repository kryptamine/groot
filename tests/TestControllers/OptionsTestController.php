<?php

namespace Kryptamine\Groot\Tests\TestControllers;

use Kryptamine\Groot\Attributes\Options;

class OptionsTestController
{
    #[Options('options-route')]
    public function optionsRoute(): void
    {

    }
}
