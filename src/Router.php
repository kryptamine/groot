<?php

namespace Kryptamine\Groot;

use Kryptamine\Groot\Adapters\RouteRegistrarAdapterInterface;
use Kryptamine\Groot\Attributes\Controller;
use Kryptamine\Groot\Attributes\RouteAttributeInterface;
use Kryptamine\Groot\Attributes\RouteInterface;
use ReflectionAttribute;
use ReflectionClass;
use Throwable;

class Router
{
    private RouteRegistrarAdapterInterface $routeRegistrar;
    private array $classes;

    public function __construct(RouteRegistrarAdapterInterface $routeCollector, array $classes)
    {
        $this->routeRegistrar = $routeCollector;
        $this->classes = $classes;
    }

    public function register(): void
    {
        foreach ($this->classes as $class) {
            $this->processAttributes($class);
        }
    }

    protected function processAttributes(string $className): void
    {
        if (!class_exists($className)) {
            return;
        }

        $reflectionClass = new ReflectionClass($className);

        /** @var Controller $controller */
        if ($controller = $this->getAttribute($reflectionClass, Controller::class)) {
            $this->routeRegistrar->addGroup(
                $controller->prefix,
                fn (RouteRegistrarAdapterInterface $routeRegistrarAdapter) => $this->registerRoutes($routeRegistrarAdapter, $reflectionClass)
            );
            return;
        }

        $this->registerRoutes(
            $this->routeRegistrar,
            $reflectionClass
        );
    }

    protected function getAttribute(ReflectionClass $class, string $attributeClass): ?RouteAttributeInterface
    {
        $attributes = $class->getAttributes($attributeClass, ReflectionAttribute::IS_INSTANCEOF);

        if (!count($attributes)) {
            return null;
        }

        $routeAttributeInstance = $attributes[0]->newInstance();

        if (!$routeAttributeInstance instanceof RouteAttributeInterface) {
            return null;
        }

        return $routeAttributeInstance;
    }

    protected function registerRoutes(RouteRegistrarAdapterInterface $routeRegistrarAdapter, ReflectionClass $class): void
    {
        foreach ($class->getMethods() as $method) {
            $attributes = $method->getAttributes(RouteInterface::class, ReflectionAttribute::IS_INSTANCEOF);

            foreach ($attributes as $attribute) {
                try {
                    $attributeClass = $attribute->newInstance();
                } catch (Throwable) {
                    continue;
                }

                if (!$attributeClass instanceof RouteAttributeInterface) {
                    continue;
                }

                if ($attributeClass instanceof RouteInterface) {
                    $routeRegistrarAdapter->addRoute($attributeClass->getMethods(), $attributeClass->getRoute(), [
                        $class->getName(),
                        $method->getName()
                    ]);
                }
            }
        }
    }
}
