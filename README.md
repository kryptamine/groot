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
2. Use a supported adapter or implement [your own](#supported-adapters)

## Usage example

```php
namespace Kryptamine\Groot;

use Kryptamine\Groot\Router;
use Bramus\Router\Router as BramusRouter;
use Kryptamine\Groot\Adapters\BramusRouterAdapter;

require 'vendor/autoload.php';

$bramusRouter = new BramusRouter();

$router = new Router(BramusRouterAdapter::fromBramusRouter($bramusRouter), [
    HomeController::class,
]);

$router->register();

$bramusRouter->run();
```

## Supported Adapters
[bramus/router](https://github.com/bramus/router)

[nikic/FastRoute](https://github.com/nikic/FastRoute)

To create your own adapter, you should implement [RouteRegistrarAdapterInterface](https://github.com/kryptamine/groot/blob/main/src/Adapters/RouteRegistrarAdapterInterface.php)

