<?php

require __DIR__ . '/../../src/config/DB.php';

$obj = new \config\DB();
$objUser = new \app\Model\Users();
$db = $obj->connect();

$data = json_decode(file_get_contents('php://input'));

$arrUsers = $objUser->getUserByBDate($data);
echo $arrUsers;