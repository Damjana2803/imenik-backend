<?php

return [

    // let the middleware run on absolutely every request
    'paths' => ['*'],

    // allow any HTTP verb the browser might pre-flight
    'allowed_methods' => ['*'],

    // wildcard origin is OK because we are NOT sending cookies
    'allowed_origins' => ['*'],

    // no regex needed when ^^^ is '*'
    'allowed_origins_patterns' => [],

    // Accept the headers your SPA will actually send
    'allowed_headers' => ['*'],

    // we are NOT using cookies -> KEEP THIS FALSE
    'supports_credentials' => false,

    'exposed_headers' => [],
    'max_age'         => 0,
];