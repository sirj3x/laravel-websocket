<?php

namespace Sirj3x\Websocket\Controllers;

use Illuminate\Support\Facades\App;
use Sirj3x\Websocket\Helpers\ParserHelper;
use Sirj3x\Websocket\Helpers\WebsocketHelper;
use Workerman\Worker;

class WebsocketWorkerController extends Worker
{
    public function __construct()
    {
        $config = [
            'ip' => config('websocket.ip'),
            'port' => config('websocket.port'),
        ];

        // SSL context.
        $context_option = [
            'context' => [
                'ssl' => config('websocket.context_ssl')
            ]
        ];

        // Set address
        $socket_name = 'websocket://' . $config["ip"] . ':' . $config["port"];

        if (config('websocket.transport_ssl')) {
            // Enable SSL. WebSocket+SSL means that Secure WebSocket (wss://).
            // The similar approaches for Https etc.
            $this->transport = 'ssl';
        }

        // Emitted when new connection come
        $this->onConnect = function ($connection) {
            $this->onConnect($connection);
        };

        // Emitted when data received
        $this->onMessage = function ($connection, $data) {
            $this->onMessage($connection, $data);
        };

        // Emitted when connection closed
        $this->onClose = function ($connection) {
            $this->onClose($connection);
        };

        parent::__construct($socket_name, $context_option);
    }

    public function onConnect($connection)
    {
        //echo "New connection\n";
    }

    public function onMessage($connection, $data): bool
    {
        $input = ParserHelper::decode($data);

        if (!isset($input["event"])) {
            WebsocketHelper::sendError($connection, 'Event not found.');
            return false;
        }

        $event = ucwords($input["event"]) . 'Event';

        if (!isset($input["data"])) {
            $data = [];
        } else {
            $data = $input["data"];
        }

        $namespace = config('websocket.events_dir');
        $eventClass = $namespace . $event;
        if (!class_exists($eventClass)) {
            WebsocketHelper::sendError($connection, 'Event not registered.');
            return false;
        }

        $result = App::call($eventClass, [
            'data' => $data
        ]);

        $connection->send(ParserHelper::encode([
            'event' => $input["event"],
            'data' => $result
        ]));

        return true;
    }

    public function onClose($connection)
    {
        //echo "Connection closed\n";
    }
}
