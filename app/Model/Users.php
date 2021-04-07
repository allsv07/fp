<?php

namespace app\Model;

use config\DB;

class Users
{
    protected $db;
    protected $connect;

    public function __construct()
    {
        $this->db = new DB();
        $this->connect = $this->db->connect();
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM `users`";
        $result = $this->connect->query($sql);
        $arrUser = $result->fetchAll(\PDO::FETCH_ASSOC);

        return $arrUser;
    }

    public function getUserByBDate($data)
    {
        $sql = "SELECT * FROM `users` WHERE YEAR(`bdate`) = ?";
        $result = $this->connect->prepare($sql);
        $result->execute([$data]);

        echo json_encode($result->fetchAll(\PDO::FETCH_ASSOC));
    }
}