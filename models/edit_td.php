<?php
require 'Db.php';
require 'Users.php';

if(!empty($_POST)){
    $update = new \models\Users();
    $update->updateUser();
}


//$content = $_POST['content'];
