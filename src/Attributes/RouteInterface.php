<?php

namespace Kryptamine\Groot\Attributes;

interface RouteInterface extends RouteAttributeInterface
{
    /**
     * Served path
     */
    public function getRoute(): string;

    /**
     * Introduces the list of supported HTTP methods
     */
    public function getMethods(): array;
}
