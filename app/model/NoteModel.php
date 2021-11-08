<?php
//include_once "database/Db.php";
//include_once "BaseModel.php";
namespace App\model;

class NoteModel extends BaseModel
{
    protected $table = "notes";

    public function create($data)
    {
        $sql = "INSERT INTO $this->table (`title`,`content`,`type_id`,`user_id`) VALUES (?,?,?,?)";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(1, $data["title"]);
        $stmt->bindParam(2, $data["content"]);
        $stmt->bindParam(3, $data["type_id"]);
        $stmt->bindParam(4, $data["user_id"]);
        $stmt->execute();

    }

    public function edit($data)
    {
        $sql = "UPDATE $this->table SET `title` = ?, `content` = ?, `type_id`=?, `user_id`=? WHERE id = ?";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(1, $data["title"]);
        $stmt->bindParam(2, $data["content"]);
        $stmt->bindParam(3, $data["type_id"]);
        $stmt->bindParam(4, $data["user_id"]);
        $stmt->bindParam(5, $data["id"]);
        $stmt->execute();
    }
}