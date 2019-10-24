<?php
use models\Users;
$ajax = new Users();
var_dump($_POST);
$ajax->addUser();