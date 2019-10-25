<?php
require 'Db.php';
require 'Users.php';

$city = new \models\Users();
$a = $city->getCities();
$arr = [];
foreach ($a as $key =>$value) {
$data = ['name' =>$value['name']];
array_push($arr,$data);

}

//var_dump($arr);
//print_r($arr);
$text = json_encode($arr, JSON_UNESCAPED_UNICODE, true);

var_dump($text);
//$text = json_encode($arr, JSON_UNESCAPED_UNICODE, true);
//print_r($text);

