<?php


namespace config;


class DB
{

    public function connect()
    {
        try {
            $dbConnection = new \PDO('mysql:host=localhost;dbname=fp', 'root', '');
            return $dbConnection;

        } catch (\PDOException $exception) {
            die($exception->getMessage());
        }
    }
}