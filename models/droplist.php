<?php
require 'Db.php';
require 'Users.php';
header('Content-Type: application/json');
$arr = [];
$city = new \models\Users();

$a = $city->getCities();
//$arr = [];
foreach ($a as $key =>$value) {

    array_push($arr,$value);


}



//$a = ['a' => 1, 'v' => 2, 'j' => 3, 'd' => 4, 'i' => 4,];
echo (json_encode($arr, JSON_UNESCAPED_UNICODE));
//
//print_r( $text);
//$text = json_encode($arr, JSON_UNESCAPED_UNICODE, true);
//print_r($text);

