<?php
require 'Db.php';
require 'Users.php';

$update = new \models\Users();
if(!empty($_POST)){
    $update->updateUser();
}


