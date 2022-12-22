<?php

class Db {
    private $connection;

    public function __construct() {
        $config = parse_ini_file('./config/config.ini', true);

        $dbhost = $config['db']['host'];
        $dbName = $config['db']['name'];
        $userName = $config['db']['username'];
        $userPassword = $config['db']['password'];

        $this->connection = new PDO("mysql:host=$dbhost;dbname=$dbName", $userName, $userPassword,
            [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
    }

    public function getConnection() {
        return $this->connection;
    }
}
