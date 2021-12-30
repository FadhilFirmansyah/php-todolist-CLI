<?php
namespace Config{

    use PDO;

    class Database{
        public static function getConnect():PDO{
            $localhost = "localhost";
            $port = 3306;
            $database = "todolist_database";
            $user = "root";
            $pass = "";

            return new PDO("mysql:host=$localhost:$port;dbname=$database", $user, $pass);
        }
    }
}
?>