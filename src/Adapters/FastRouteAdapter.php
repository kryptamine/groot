<?php

namespace Kryptamine\Groot\Adapters;

use FastRoute\RouteCollector;

class FastRouteAdapter implements RouteRegistrarAdapterInterface
{
    private RouteCollector $routeCollector;

    private function __construct(RouteCollector $routeCollector)
    {
        $this->routeCollector = $routeCollector;
    }

    public static function fromFastRouteCollector(RouteCollector $routeCollector): self
    {
        return new self($routeCollector);
    }

    public function addRoute($httpMethods, string $route, array $handler): void
    {
        $this->routeCollector->addRoute($httpMethods, $route, $handler);
    }

    public function addGroup(string $prefix, callable $chain): void
    {
        $this->routeCollector->addGroup($prefix, function (RouteCollector $routeCollector) use ($chain) {
            $chain(FastRouteAdapter::fromFastRouteCollector($routeCollector));
        });
    }
}
