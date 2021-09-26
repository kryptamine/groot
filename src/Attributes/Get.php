<?php

namespace Kryptamine\Groot\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class Get implements RouteInterface
{
    use UriTrait;

    public function getMethods(): array
    {
        return [HttpMethods::GET];
    }
}
