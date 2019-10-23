<?php


namespace models;

use models\Db;
//require 'Db.php';

class Users extends Db
{
    public function getCities()
    {
        $result = $this->rows('select * from cities');
        return $result;
    }

    public function getUsers()
    {
//        $params = [
//            'id' => $_GET['id'],
//        ];
        $result = $this->rows('select * from users');
        return $result;
    }

    public function addUser()
    {
        $name = trim(strip_tags($_POST['name']));
        $age = $_POST['age'];
        //$city = trim(strip_tags($_POST['city']));

        if (strlen($name) > 30 or strlen($name) < 3) {
            echo 'Имя должно содержать от 3 до 30 символов';
        }
        if ($age < 0) {
            echo 'Возраст не может быть отрицательным';
        }

        $params = [
            'name' => $name,
            'age'=>$age,
        ];

        $result = $this->query('insert into users(name,age) values(:name,:age)', $params);

        if($result){
            return true;
//            header('location :'.$_SERVER['REQUEST_URI']);
        }else{
            echo 'что-то пошло не так';
        }

        return $result;


    }

    public function redirect($url){
        header('location'.$url);
        exit;
    }

}