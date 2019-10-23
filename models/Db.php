<?php


namespace models;
//use PDO;

require '../config/config.php';

class Db
{
    protected $db;

    public function __construct()
    {
        $this->db = new \PDO('mysql:host=' . HOST . ';dbname=' . DB_NAME, USER, PASSWORD);
    }

    /**
     * @param $sql
     * @param array $params
     * @return bool|\PDOStatement
     *
     */
    //Функция запроса к базе с параметрами
    public function query($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql, $params);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                $stmt->bindValue(':' . $key, $val);
            }
        }
        $stmt->execute();
        return $stmt;
    }

    // Получение всех значениц из базы
    public function rows($sql, $params = []){
        $result = $this->query($sql, $params);
        return $result->fetchAll(\PDO::FETCH_ASSOC);

    }


}