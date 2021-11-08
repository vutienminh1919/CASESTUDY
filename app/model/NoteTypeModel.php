<?php
//include_once "database/Db.php";
//include_once "BaseModel.php";
namespace App\model;
class NoteTypeModel extends BaseModel
{
    protected $table = "note_types";

    public function create($data)
    {
        $sql = "INSERT INTO $this->table (`name`,`description`) VALUES (?,?)";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(1, $data["name"]);
        $stmt->bindParam(2, $data["description"]);
        $stmt->execute();

    }

    public function edit($data)
    {
        $sql = "UPDATE $this->table SET `name` = ?, `description` = ? WHERE `id` = ?";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(1, $data["name"]);
        $stmt->bindParam(2, $data["description"]);
        $stmt->bindParam(3, $data["id"]);
        $stmt->execute();
    }
}
