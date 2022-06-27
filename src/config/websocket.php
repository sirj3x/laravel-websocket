<?php

return [
    // Websocket address
    'ip' => env('WEBSOCKET_IP', '0.0.0.0'),
    'port' => env('WEBSOCKET_PORT', 8443),

    // Websocket directories
    'events_dir' => 'App\\Http\\Websocket\\Events\\',

    // Websocket context
    'context' => [
        'ssl' => [
            'local_cert' => base_path('ssl/ssl.cert'),
            'local_pk' => base_path('ssl/ssl.key'),
            'verify_peer' => false,
            'allow_self_signed' => false, // Allow self-signed certs (should be false in production)
        ]
    ]
];
