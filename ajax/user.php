<?php
require_once('../db.php');
require_once('../libs/function.php');

$data = json_decode(file_get_contents('php://input'));
$data = htmlspecialchars($data);

$result = $db->prepare("SELECT * FROM `users` WHERE YEAR(`bdate`) = ?");
$result->execute([$data]);
$arrUsers = $result->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($arrUsers);
