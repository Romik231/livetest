<h3>Добавить пользователя</h3>
<form method="post" action="http://livetest/models/ajax.php" id="form_user" class="form" id="form_add">
    <label for="name">Имя</label>
    <input type="text" name="name" id="name" required="required">
    <label for="age">Возраст</label>
    <input type="text" name="age" id="age" required="required">
    <label for="city">Город</label>
    <select name="city" id="city">
        <option value="Город не выбран">Город не выбран</option>
        <?php foreach ($city as $key => $val): ?>
            <option value="<?= $val['id'] ?>" class="city-list"><?= $val['name'] ?></option>
        <?php endforeach; ?>
    </select>

    <input type="submit" id="btn-send" class="send" value="Добавить">

</form>

<div id="result_form"></div>


<div class="users">
    <table border="1">
        <tr>
            <td>Имя пользователя</td>
            <td>Возраст</td>
            <td>Город</td>
        </tr>
        <?php foreach ($users as $key => $val):

            if ($val['city_name'] == NULL):
                $val['city_name'] = 'Город не выбран'; ?>
            <?php endif; ?>
            <tr class="row">
                <td id='<?= $val['user_id'] ?>' contenteditable="true"
                    class="column_name"><?= $val['name']; ?></td>
                <td id='<?= $val['user_id'] ?>' contenteditable="true"
                    class="column_age"><?= $val['age']; ?></td>
                <td id='<?= $val['city_id'] ? $val['city_id'] : 'city_id' ?>' contenteditable="true"
                    class="city-column"><?= $val['city_name']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>