<?php
namespace App\controller;
//include_once "../model/NoteTypeModel.php";

use App\model\NoteTypeModel;

class NoteTypeController
{

    private $noteTypeModel;

    public function __construct()
    {
        $this->noteTypeModel = new NoteTypeModel();

    }

    public function index()
    {
        $noteTypes = $this->noteTypeModel->getAll();
        include_once "app/view/noteType/list.php";
    }

    public function showFormCreate()
    {
        include_once "app/view/noteType/create.php";
    }

    public function create($data)
    {
        $data2 = [
            "name" => $data['name'],
            "description" => $data['description']
        ];
        $this->noteTypeModel->create($data2);
        header("Location:index.php?page=noteType-list");
    }

    public function delete($id)
    {
        $this->noteTypeModel->delete($id);
        include_once "app/view/noteType/delete.php";
    }

    public function showFormEdit()
    {
        $id = $_REQUEST["id"];
        $noteType = $this->noteTypeModel->getById($id);
        include_once "app/view/noteType/edit.php";
    }

    public function edit($id, $request)
    {
        $noteType = $this->noteTypeModel->getById($id);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data2 = [
                "name" => $request["name"],
                "description" => $request["description"],
                "id" => $id
            ];
        }
        $this->noteTypeModel->edit($data2);
        header("Location:index.php?page=noteType-list");
    }


}