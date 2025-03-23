<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'], // Allow CSRF and API routes
    'allowed_methods' => ['*'],
    'allowed_origins' => ['http://localhost:3000'], // Frontend URL
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'Access-Control-Allow-Credentials' =>true,
    'supports_credentials' => true, // ✅ Important for authentication
];

