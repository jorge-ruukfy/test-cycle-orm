<?php

use Cycle\Database\Config\DatabaseConfig;
use Cycle\Database\Config\Postgres\DsnConnectionConfig;
use Cycle\Database\Config\PostgresDriverConfig;

return new DatabaseConfig([
    'default' => 'default',
    'aliases' => [],
    'databases' => [
        'default' => ['connection' => 'postgres'],
    ],
    'connections' => [
        'postgres' => new PostgresDriverConfig(
            connection: new DsnConnectionConfig(
                dsn: 'pgsql:host=127.0.0.1;port=35432;dbname=spiral',
                user: 'postgres',
                password: 'postgres',
            ),
            schema: 'public',
            queryCache: true,
        ),
    ],
]);