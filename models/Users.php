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
    public function getUser()
    {
        $id = (int)trim(strip_tags($_GET['id']));
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
        $sql = 'SELECT users.id AS user_id, users.name, users.age, cities.name 
                AS city_name, cities.id 
                AS city_id FROM users 
                LEFT OUTER JOIN cities ON users.city_id = cities.id';
        $result = $this->rows($sql);

        return $result;
    }

    //Функция добавления пользователя в базу
    public function addUser()
    {   //Проверяем имя, не меньше 3, не больше 30 символов, не пустая строка
        if (strlen($_POST['name']) > 30 or strlen($_POST['name']) < 3 or $_POST['name'] == '') {
            print_r('Имя должно содержать от 3 до 30 символов и не должно быть пустым');
            return false;
        }//Проверяем возраст не меньше 0, и число
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

    //Обновление данных о пользователе
    public function updateUser()
    {
        $id = trim(strip_tags($_POST['id']));
        $name = trim(strip_tags($_POST['content']));
        $params = [
            'id' => $id,
            'name' => $name,
        ];

        if ($_POST['class'] == 'column_age') {
            $age = $this->query('update users set age=:name where id=:id', $params);
            return $age;
        } else {
            $result = $this->query('update users set name=:name where id=:id', $params);
            return $result;
        }


    }


}