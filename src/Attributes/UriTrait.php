<?php

namespace Kryptamine\Groot\Attributes;

trait UriTrait
{
    private string $uri;

    public function __construct(string $uri)
    {
        $this->uri = $uri;
    }

    public function getRoute(): string
    {
        return $this->uri;
    }
}
