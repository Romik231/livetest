<?php
require 'Db.php';
require 'Users.php';
header('Content-Type: application/json');
$update = new \models\Users();
if(!empty($_POST)){
    $update->updateUser();
    exit;
}

//$arr = [];
//$city = $update->getCities();
//
//foreach ($city as $key =>$value) {
//
//    array_push($arr,$value);
//}
//
//echo (json_encode($arr, JSON_UNESCAPED_UNICODE));
