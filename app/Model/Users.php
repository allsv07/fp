<?php

namespace app\Model;

use config\DB;
use DI\Container;

class Users
{
    protected $db;
    protected $connection;
    protected $container;

    public function __construct()
    {
        $this->db = new DB();
        $this->connection = $this->db->connect();
    }

    public function getAllUsers()
    {

            $sql = "SELECT * FROM `users`";
            $res = $this->connection->query($sql);
            $arrUser = $res->fetchAll(\PDO::FETCH_ASSOC);

            return $arrUser;

    }

    public function getUserByBDate($data)
    {
        $sql = "SELECT * FROM `users` WHERE YEAR(`bdate`) = ?";
        $result = $this->connection->prepare($sql);
        $result->execute([$data]);
        $arrRes = $result->fetchAll(\PDO::FETCH_ASSOC);

        return $arrRes;
    }

}