<?php

namespace App;

class DB {

    private static $server = 'localhost';

    private static $username = 'root';

    private static $password = '12345';

    private static $database = 'crud_php_test';

    private static $connection;

    private static $data = array();

    public static function connect()
    {
        self::$connection = new \mysqli(self::$server, self::$username, self::$password, self::$database);

        if (self::$connection->connect_error) {
            throw new \Exception('Unable to connect.');
        }

        return self;
    }

    public function close()
    {
        self::$connection->close();
    }

    public static function executeQuery($sql)
    {
        self::$data = self::$connection->query($sql);
        return self;
    }

    public static function getData()
    {
        return self::$data;
    }

}
