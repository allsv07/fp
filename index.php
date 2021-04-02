<?php
require_once('db.php');

if (isset($_POST['btn_birth'])) {
    $date = htmlspecialchars($_POST['date_birth']);

    //get user
    $result = $db->prepare("SELECT * FROM `users` WHERE YEAR(`bdate`) = ?");
    $result->execute([$date]);
} else {
    $result = $db->query("SELECT * FROM `users`");
}

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
<? $count = $result->rowCount(); ?>
<span class="count_user">Пользователи (<?=$count?>)</span>
<table>
    <th>№</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Date of birth</th>
    <? if (isset($result)): ?>
    <? while ($user = $result->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['first_name'] ?></td>
            <td><?= $user['last_name'] ?></td>
            <td><?= $user['bdate'] ?></td>
        </tr>
    <? endwhile; ?>
    <? endif; ?>
</table>

<div class="block-form">
    <form action="" method="post" class="form_birth">
        <label class="label_birth_date" for="date">Введите год</label>
        <input type="text" name="date_birth" id="date_birth" class="date_birth">
        <input type="submit" name="btn_birth" class="btn_birth" value="Показать">
    </form>
</div>


</body>
</html>
