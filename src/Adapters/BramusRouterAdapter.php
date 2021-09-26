<?php

namespace Kryptamine\Groot\Adapters;

use Bramus\Router\Router;

class BramusRouterAdapter implements RouteRegistrarAdapterInterface
{
    private Router $router;

    private function __construct(Router $router)
    {
        $this->router = $router;
    }

    public static function fromBramusRouter(Router $router): self
    {
        return new self($router);
    }

    public function addRoute(array $httpMethods, string $route, array $handler): void
    {
        $this->router->match(
            implode('|', $httpMethods),
            $route,
            implode('@', $handler),
        );
    }

    public function addGroup(string $prefix, callable $chain): void
    {
        $this->router->mount($prefix, function () use ($chain) {
            $chain(self::fromBramusRouter($this->router));
        });
    }
}
