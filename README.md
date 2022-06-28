# Websocket Package for Laravel

Websocket supports HTTP, Websocket, SSL and other custom protocols.
<br/>

this package worked with **[Workerman](https://github.com/walkor/workerman)**


## Requirement

* Laravel >=6
* PHP >=7.3
* Workerman package

## Install

### Step 1
Install Workerman via composer

``` bash
composer require workerman/workerman
```

### Step 2
Download and move files to: `{laravel-project-folder}/packages/sirj3x/websocket/{here}`

### Step 3
Add line to: `config/app.php`
``` php
/*
 * Package Service Providers...
 */
Sirj3x\Websocket\WebsocketServiceProvider::class, // add this
```

### Step 4
Add line to your`composer.json`
``` json
"autoload-dev": {
    "psr-4": {
        "Tests\\": "tests/",
        "Sirj3x\\Websocket\\": "packages/sirj3x/websocket/src" // add this
    }
},
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
