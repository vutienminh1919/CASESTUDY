<?php

//include_once "database/Db.php";
namespace App\model;


class BaseModel{
    protected $table;
    protected $dbConnect;
    public function __construct()
    {
        $db = new Db();
        $this->dbConnect = $db->connect();
    }
    public function getAll()
    {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->dbConnect->query($sql);
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        $stmt = $this->dbConnect->query($sql);
        return $stmt->fetch();
    }
    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
    }

}