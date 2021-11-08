<?php
namespace App\controller;
//include_once "../model/NoteModel.php";

use App\model\NoteModel;

class NoteController
{
    private $noteModel;

    public function __construct()
    {
        $this->noteModel = new NoteModel();

    }

    public function index()
    {
        $notes = $this->noteModel->getAll();
        include_once "app/view/note/list.php";
    }

    public function showFormCreate()
    {
        include_once "app/view/note/create.php";
    }

    public function create($data)
    {
        $data2 = [
            "title" => $data['content'],
            "content" => $data['content'],
            "type_id" => (int)$data['type_id'],
            "user_id" => (int)$data['user_id']
        ];
        $this->noteModel->create($data2);
        header("Location:index.php");
    }

    public function delete($id)
    {
        $this->noteModel->delete($id);
        include_once "app/view/note/delete.php";
    }

    public function showFormEdit()
    {
        $id = $_REQUEST["id"];
        $note = $this->noteModel->getById($id);
        include_once "app/view/note/edit.php";
    }

    public function edit($id,$request)
    {
        $note = $this->noteModel->getById($id);
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $data = [
                "title" => $request["title"],
                "content" => $request["content"],
                "type_id" => $request["type_id"],
                "user_id" => $request["user_id"],
                "id" => $id
            ];
        }
        $this->noteModel->edit($data);
        header("Location:index.php");
    }
    public function showDetail($id)
    {
        $product = $this->noteModel->getById($id);
        include_once "app/view/note/detail.php";

    }



}