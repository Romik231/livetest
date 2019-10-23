<?php


namespace models;
use models\Users;

class User extends Users
{
    public function getUser(){
        $id = $_GET['id'];
        $params = [
            'id' => $id,
        ];
        $result = $this->query('select * from users where id=:id', $params);
        return $result;
    }
}