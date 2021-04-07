
<span class="count_user">Пользователи (<strong><?=$countUser?></strong>)</span>
<table>
    <thead>
    <th>№</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Date of birth</th>
    </thead>

    <tbody>

    <?php
        foreach ($users as $user) {
            echo "
                <tr>
                    <td>".$user['id']."</td>
                    <td>".$user['first_name']."</td>
                    <td>".$user['last_name']."</td>
                    <td>".$user['bdate']."</td>
                </tr>";
                    }
    ?>

    </tbody>
</table>

<div class="block-form">
    <form action="" method="post" class="form_birth">
        <label class="label_birth_date" for="date_birth">Введите год</label>
        <input type="text" name="date_birth" id="date_birth" class="date_birth">
        <input type="submit" name="btn_birth" class="btn_birth" id="btn_birth" value="Показать">
    </form>
</div>

