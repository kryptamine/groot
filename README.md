# PHP 8 attributes router adapter

This package is an adapter that provides the ability to integrate PHP 8 attributes with any router you'd prefer to use.

```php
use Kryptamine\Groot\Attributes\Get;
use Kryptamine\Groot\Attributes\Post;
use Kryptamine\Groot\Attributes\Controller;

#[Controller('users')]
class HomeController
{
    #[Get('/')]
    public function getUsers(): void
    {

    }
    
    #[Get('/{id:\d+}')]
    public function getUser(int $id): void
    {

    }
    
    #[Post('/')]
    public function saveUser(): void
    {

    }
    
    ...
}
```
## Installation

1. Install the package via composer:

```bash
composer require kryptamine/groot
```

