<?php
require_once('db.php');

//get user
$result = $db->query("SELECT * FROM `users` WHERE YEAR(`bdate`) = '1990'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>user</title>
</head>
<body>
<style>
    table {
        border: 1px solid #eee;
        table-layout: fixed;
        width: 100%;
        margin-bottom: 20px;
    }

    table th {
        font-weight: bold;
        padding: 5px;
        background: #efefef;
        border: 1px solid #ddd;
    }

    table td {
        padding: 5px 10px;
        border: 1px solid #eee;
        text-align: left;
    }
</style>

<table>
    <th>№</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Date of birth</th>
    <? while ($user = $result->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['first_name'] ?></td>
            <td><?= $user['last_name'] ?></td>
            <td><?= $user['bdate'] ?></td>
        </tr>
    <? endwhile; ?>
</table>
</body>
</html>
