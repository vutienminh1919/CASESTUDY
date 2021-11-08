<?php
namespace App\model;
use PDO;
use PDOException;

class Db
{
    private string $dsn;
    private string $username;
    private string $password;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost:3306;dbname=demo-inote;charset=utf8";
        $this->username = "root";
        $this->password = "24091996";
    }

    public function connect()
    {
        try {
            return new PDO($this->dsn, $this->username, $this->password);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }


}