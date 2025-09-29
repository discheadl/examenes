<?php
return [
    'debug' => true,
    'Datasources' => [
        'default' => [
            'className'  => Connection::class,
            'driver'     => Mysql::class,
            'persistent' => false,

            'host'       => env('DB_HOST')     ?: 'mysql.railway.internal',
            'port'       => (int)(env('DB_PORT') ?: 3306),
            'username'   => env('DB_USERNAME') ?: 'root',
            'password'   => env('DB_PASSWORD') ?: '',
            'database'   => env('DB_DATABASE') ?: 'railway',

            'encoding'      => 'utf8mb4',
            'timezone'      => 'UTC',
            'cacheMetadata' => true,
            'flags' => [
                PDO::ATTR_TIMEOUT => 5,
                
            ],
        ],
    ],
    'EmailTransport' => [
        'default' => [
            'host' => 'localhost',
            'port' => 25,
            'username' => null,
            'password' => null,
            'client' => null,
            'url' => env('EMAIL_TRANSPORT_DEFAULT_URL', null),
        ],
    ],
    'Security' => [
        'salt' => '13ae6331c525193dac1b58d0c99c3035627b4eedd544f25650384dc246ecaf7b',
    ],
];