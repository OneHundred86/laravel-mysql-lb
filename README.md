### 1.配置 `config/database.php`

```php
return [
    'connections' => [
        // ...
        'mysql-lb' => [
            'driver' => 'mysql-lb',
            'servers' => env('DB_SERVERS', '127.0.0.1:3306'),
            'servers_weight' => env('DB_SERVERS_WEIGHT', ''),

            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],
    ],
];
```

### 2.配置 `.env`
```dotenv
DB_CONNECTION=mysql-lb
DB_SERVERS=127.0.0.1:3307,127.0.0.1:3308,127.0.0.1:3309,127.0.0.1:3306
DB_SERVERS_WEIGHT=4,3,2,1   # 非必须
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
