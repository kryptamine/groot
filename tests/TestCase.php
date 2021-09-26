<?php

namespace Kryptamine\Groot\Tests;

use Kryptamine\Groot\Adapters\ArrayAdapter;
use Kryptamine\Groot\Router;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class TestCase extends PHPUnitTestCase
{
    protected ArrayAdapter $adapter;
    protected string $path = '';

    protected function setUp(): void
    {
        parent::setUp();

        $this->adapter = new ArrayAdapter();
    }

    protected function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    protected function getRoutes(): array
    {
        return $this->path ? $this->adapter->getRoutes()[$this->path] : $this->adapter->getRoutes();
    }

    protected function registerRoute(string $class): static
    {
        $router = new Router($this->adapter, [$class]);
        $router->register();

        return $this;
    }

    protected function assertRoutesCount(int $count): self
    {
        self::assertCount($count, $this->getRoutes());
        return $this;
    }

    protected function assertRouteRegistered(array $methods, string $route, array $handler): self
    {
        self::assertContains([
            'methods' => $methods,
            'route' => $route,
            'handler' => $handler,
        ], $this->getRoutes());

        return $this;
    }
}
