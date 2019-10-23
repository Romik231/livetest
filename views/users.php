

<?php //foreach ($text as $key => $value):?>
<!---->
<!--    -->
<!---->
<?// endforeach;?>

<?//=var_dump($city);?>

<h3>Добавить пользователя</h3>
<form method="post" id="form_user" class="form" id="form_add">
    <label for="name">Имя</label>
    <input type="text" name="name" id="name" required="required">
    <label for="age">Возраст</label>
    <input type="text" name="age" id="age" required="required">
    <label for="city">Город</label>
<!--    <input type="text" name="city" id="city" >-->
    <select name="city" id="city">
        <option value="Город не выбран">Город не выбран</option>
        <?php foreach ($city as $key => $val):?>
            <option value="<?=$val['id']?>"><?=$val['name']?></option>
        <? endforeach;?>
    </select>

    <button type="button" id="btn-send" class="send">Добавить</button>
</form>

<div id="result_form"></div>


<div class="users">
    <table border="1">
        <tr>
            <td>Имя пользователя</td>
            <td>Возраст</td>
            <td>Город</td>
        </tr>
        <?php foreach ($users as $key => $val):?>
<!--        --><?//=var_dump($_POST);?>
        <tr>
            <td><?=$val['name'];?></td>
            <td><?=$val['age'];?></td>
            <td><?=$val['city'];?></td>
        </tr>
        <?php endforeach;?>
    </table>
</div>