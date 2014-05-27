<?php
namespace Moxy\Services;

class Database implements \Moxy\Interfaces\Service {

    public static function create($container) {
        $config = $container['database'];
        if(isset($config['user']) && isset($config['password'])) {
            return new \PDO($config['dsn'],$config['user'],$config['password']);
        }
        return new \PDO($config['dsn']);
    }
}