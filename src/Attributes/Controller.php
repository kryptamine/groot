<?php

namespace Kryptamine\Groot\Attributes;

use Attribute;
use Kryptamine\Groot\Attributes\RouteInterface;

#[Attribute(Attribute::TARGET_CLASS)]
class Controller implements RouteAttributeInterface
{
    public string $prefix;

    public function __construct(string $controller)
    {
        $this->prefix = $controller;
    }
}
