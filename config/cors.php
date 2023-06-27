<?php

return [

    'paths' => ['api/getList', 'api/getDetails/*'],
    'allowed_methods' => ['GET'],
    'allowed_origins' => ['example.com', '*.example.org'],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,

];
