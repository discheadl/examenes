<?php
return [
    'debug' => true,
    'Datasources' => [
        'default' => [
            'className'  => Connection::class,
            'driver'     => Mysql::class,
            'persistent' => false,

            // Usa tus variables o los defaults de Railway (sin 'tcp:')
            'url' => env('DATABASE_URL', null),

            'encoding'      => 'utf8mb4',
            'timezone'      => 'UTC',
            'cacheMetadata' => true,
            'flags' => [
                PDO::ATTR_TIMEOUT => 5,
                // No necesitas 'MYSQL_ATTR_INIT_COMMAND' si usas 'encoding'
            ],

            // Si vas a usar DSN, deja esto y asegúrate de que sea correcto.
            // Si NO lo usas, ponlo en null o quítalo.
            'url' => env('DATABASE_URL', null),
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