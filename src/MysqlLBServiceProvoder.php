<?php

namespace Oh86\MySqlLB;

use Illuminate\Database\DatabaseManager;
use Illuminate\Database\MySqlConnection;
use Illuminate\Support\ServiceProvider;
use Oh86\MySqlLB\Connector\MysqlLBConnector;

class MysqlLBServiceProvoder extends ServiceProvider
{
    public function register()
    {
        $this->app->resolving('db', function (DatabaseManager $db) {
            $db->extend('mysql-lb', function ($config, $name) {
                $config['name'] = $name;
                return new MySqlConnection(
                    (new MysqlLBConnector())->lbConnect($config),
                    $config['database'],
                    $config['prefix'],
                    $config
                );
            });
        });
    }
}