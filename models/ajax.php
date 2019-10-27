<?php
require 'Db.php';
require 'Users.php';

if (!empty($_POST)){
$a = new \models\Users();
$a->addUser();
}

