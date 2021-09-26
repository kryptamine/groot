<?php

namespace Kryptamine\Groot\Adapters;

class ArrayAdapter implements RouteRegistrarAdapterInterface
{
    private array $routes = [];

    public function addRoute(array $httpMethods, string $route, array $handler): void
    {
        $this->routes[] = [
            'methods' => $httpMethods,
            'route' => $route,
            'handler' => $handler,
        ];
    }

    public function addGroup(string $prefix, callable $chain): void
    {
        $group = new self();

        $chain($group);

        $this->routes[$prefix] = $group->getRoutes();
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }
}
