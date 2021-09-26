<?php

namespace Kryptamine\Groot\Adapters;

interface RouteRegistrarAdapterInterface
{
    /**
     * @param string[] $httpMethods
     */
    public function addRoute(array $httpMethods, string $route, array $handler): void;

    public function addGroup(string $prefix, callable $chain): void;
}
