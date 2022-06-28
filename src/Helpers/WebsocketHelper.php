<?php

namespace Sirj3x\Websocket\Helpers;

class WebsocketHelper
{
    public static function sendError($conn, $message)
    {
        $conn->send(json_encode([
            'event' => 'error',
            'data' => [
                'message' => $message
            ]
        ]));
    }
}
