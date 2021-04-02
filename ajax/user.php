<?php
require_once('../db.php');
require_once('../libs/function.php');

if (isset($_POST['date_birth']) && !empty($_POST['date_birth'])) {
    $date = htmlspecialchars($_POST['date_birth']);
    $result = $db->prepare("SELECT * FROM `users` WHERE YEAR(`bdate`) = ?");
    $result->execute([$date]);
    $arrUsers = $result->fetchAll(PDO::FETCH_ASSOC);

    foreach ($arrUsers as $user) { ?>
        <tr>
            <td><?=$user['id']?></td>
            <td><?=$user['first_name']?></td>
            <td><?=$user['last_name']?></td>
            <td><?=$user['bdate']?></td>
        </tr>
    <?php }
}