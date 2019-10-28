<?php
require 'Db.php';
require 'Users.php';
header('Content-Type: application/json');
$arr = [];
$city = new \models\Users();

$a = $city->getCities();
foreach ($a as $key =>$value) {
    array_push($arr,$value);
}

echo (json_encode($arr, JSON_UNESCAPED_UNICODE));



