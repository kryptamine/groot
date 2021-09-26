<?php

namespace Kryptamine\Groot\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class Options implements RouteInterface
{
    use UriTrait;

    public function getMethods(): array
    {
        return [HttpMethods::OPTIONS];
    }
}
