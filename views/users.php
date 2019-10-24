

<?php foreach ($city as $key => $value):?>
<!--    --><?//=var_dump($value['name']);?>


<? endforeach;?>



<h3>Добавить пользователя</h3>
<form method="post" action="http://livetest/public/index.php?c=page&act=users" id="form_user" class="form" id="form_add">
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
             if ($val['city'] == NULL):
            $val['city'] = 'Город не выбран';?>
            <?php endif;?>
        <tr>
            <td class="column"><?=$val['name'];?></td>
            <td class="column"><?=$val['age'];?></td>
            <td class="city-column"><?=$val['city'];?></td>
        </tr>
        <?php endforeach;?>
    </table>
</div>