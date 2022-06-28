# Websocket Package for Laravel

Websocket supports HTTP, Websocket, SSL and other custom protocols.
<br/>

this package worked with **[Workerman](https://github.com/walkor/workerman)**


## Requirement

* Laravel >=6
* PHP >=7.3
* Workerman package

## Install with composer

``` bash
composer require sirj3x/laravel-websocket
```

## vendor:publish
You can run vendor:publish command to have config file of package on this path: `config/websocket.php`
``` bash
php artisan vendor:publish --provider="Sirj3x\Websocket\WebsocketServiceProvider"
```

## Available commands

Run websocket:
``` bash
php artisan ws:run
```

Create event:
``` bash
php artisan make:ws-event {event-name}
```

## License
The [MIT license](http://opensource.org/licenses/MIT) (MIT). Please see [License File](https://github.com/sadegh19b/laravel-persian-validation/blob/master/LICENSE.md) for more information.
