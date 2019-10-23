
<?php //foreach ($text as $key => $value):?>
<!--    --><?//=var_dump($_POST);?>
<?// endforeach;?>


<h3>Добавить пользователя</h3>
<form action="" method="post" class="form" id="form_add">
    <label for="name">Имя</label>
    <input type="text" name="name" id="name" required="required">
    <label for="age">Возраст</label>
    <input type="text" name="age" id="age" required="required">
    <label for="city">Город</label>
    <input type="text" name="city" id="city" >
<!--    <select name="city" id="city">-->
<!--        <option value="">Город не выбран</option>-->
<!--    </select>-->

    <button type="submit" id="btn-send" class="send">Добавить</button>
</form>

<div id="result-form"></div>

