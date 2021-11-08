<?php
namespace App\controller;
//include_once "../model/UserModel.php";

use App\model\UserModel;

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $users = $this->userModel->getAll();
        include_once "app/view/user/list.php";
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        header("Location:index.php?page=user-list");
        include_once "app/view/user/delete.php";
    }

    public function showFormEdit()
    {
        $id = $_REQUEST["id"];
        $user = $this->userModel->getById($id);
        include_once "app/view/user/edit.php";
    }

    public function edit($id, $request)
    {
//        var_dump($_FILES);
//        die();
        $filepath = "";
        if (isset($_FILES["file"])){
//        if (isset($_POST["upload"])) {
           $filepath = "uploads/" . $_FILES["file"]["name"];
           if (move_uploaded_file($_FILES["file"]["tmp_name"],$filepath)){
               echo "<img src=".$filepath."height=200 width=300/>";
           }else{
               echo "Error!";
           }

        }

        $user = $this->userModel->getById($id);
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data2 = [
                "name" => $request["name"],
                "email" => $request["email"],
                "password" => $request["password"],
                "image" => $filepath,
                "id"=>$id
            ];
        }
        $this->userModel->edit($data2);
        header("Location:index.php?page=user-list");
    }

}