<?php
//include_once "database/Db.php";
//include_once "BaseModel.php";
namespace App\model;

class UserModel extends BaseModel
{
    protected $table = 'users';

    function checkLogin($email, $password)
    {
        $sql = "SELECT * FROM $this->table WHERE email = :email and password = :password";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        return $stmt->rowCount() > 0;

    }

    public function getByEmail($email)
    {
        $sql = "SELECT * FROM $this->table WHERE email = :email";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt->fetch();

    }

    public function register($data)
    {
        $sql = "INSERT INTO $this->table(name,email,password) VALUES (?,?,?)";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(1, $data["name"]);
        $stmt->bindParam(2, $data["email"]);
        $stmt->bindParam(3, $data["password"]);
        $stmt->execute();

    }

    public function edit($data)
    {
        $sql = "UPDATE $this->table SET `name` = ?,`email` = ?,`password` = ?,`image` = ? WHERE id = ?";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(1, $data["name"]);
        $stmt->bindParam(2, $data["email"]);
        $stmt->bindParam(3, $data["password"]);
        $stmt->bindParam(4, $data["image"]);
        $stmt->bindParam(5, $data["id"]);
        $stmt->execute();
    }
}