<?php
require_once('db.php');
require_once('libs/function.php');

$result = $db->query("SELECT * FROM `users`");
$arrUsers = $result->fetchAll(PDO::FETCH_ASSOC);
//pr($arrUsers);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/style.css">

    <title>user</title>
</head>
<body>

<span class="count_user">Пользователи (<strong><?=count($arrUsers)?></strong>)</span>
<table>
    <thead>
        <th>№</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date of birth</th>
    </thead>

    <tbody>
    <? foreach ($arrUsers as $user): ?>
        <tr>
            <td><?=$user['id']?></td>
            <td><?=$user['first_name']?></td>
            <td><?=$user['last_name']?></td>
            <td><?=$user['bdate']?></td>
        </tr>
    <? endforeach; ?>
    </tbody>
</table>

<div class="block-form">
    <form action="" method="post" class="form_birth">
        <label class="label_birth_date" for="date">Введите год</label>
        <input type="text" name="date_birth" id="date_birth" class="date_birth">
        <input type="submit" name="btn_birth" class="btn_birth" id="btn_birth" value="Показать">
    </form>
</div>

<script src="libs/jQuery.js"></script>
<script src="libs/script.js"></script>
</body>
</html>
