<?php


namespace models;

use models\Db;


class Users extends Db
{
//получение всех городов
    public function getCities()
    {
        $result = $this->rows('select * from cities order by name');
        return $result;
    }
//получение конкретного пользователя
    public function getUser(){
        $id = $_GET['id'];
        $params = [
            'id' => $id,
        ];
        $result = $this->query('select * from users where id=:id', $params);
        return $result;
    }

    //получение пользователей с соответствующими городами
    public function getUsers()
    {
//
        $sql = 'SELECT users.name, users.age, cities.name 
                AS city FROM users 
                LEFT OUTER JOIN cities ON users.city_id = cities.id;';
        $result = $this->rows($sql);
        return $result;
    }

    //Функция добавления пользователя в базу
    public function addUser()
    {
        if (strlen($_POST['name']) > 30 or strlen($_POST['name']) < 3) {
            echo 'Имя должно содержать от 3 до 30 символов';
            return false;
        }
        if ($_POST['age'] < 0 and !is_int($_POST['age'])) {
            echo 'Возраст не может быть отрицательным и должен быть числом';
            return false;
        } else {
            $name = trim(strip_tags($_POST['name']));
            $age = trim(strip_tags($_POST['age']));
            $city = $_POST['city'];//значение не проверяем так как оно подгружается из базы

            $params = [
                'name' => $name,
                'age' => $age,
                'city' => $city
            ];
            $result = $this->query('insert into users(name,age,city_id) values(:name,:age,:city)', $params);
            if (!$result) {
                echo 'что-то пошло не так';
                return false;
            } else {
                return true;
            }
        }
    }


}