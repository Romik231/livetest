<?php
require 'Db.php';
require 'Users.php';
header('Content-Type: application/json');
$update = new \models\Users();
if(!empty($_POST)){
    $update->updateUser();
}

$arr = [];
$a = $city->getCities();

foreach ($a as $key =>$value) {

    array_push($arr,$value);
}

echo (json_encode($arr, JSON_UNESCAPED_UNICODE));
