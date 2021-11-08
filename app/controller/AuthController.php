<?php

namespace App\controller;
//include_once "../model/UserModel.php";

use App\model\UserModel;
use PDOException;

class AuthController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function showFormLogin()
    {
        include_once "app/view/auth/login.php";

    }

    public function login($request)
    {
        $email = $request["email"];
        $password = $request["password"];
        if ($this->userModel->checkLogin($email, $password)) {
            $user = $this->userModel->getByEmail($email);
            $_SESSION["username"] = $user["name"];
            $_SESSION["img"] = $user["img"];
            header("Location:index.php");
        } else {
            var_dump("tai khoan khong dung");
        }

    }


    public function logout()
    {
        unset($_SESSION["username"]);
        header("Location:index.php?page=login");

    }

    public function checkAuth()
    {
        if (!isset($_SESSION["username"])) {
            header("Location:index.php?page=login");
        }

    }

    public function showFormRegister()
    {
        include_once "app/view/auth/register.php";
    }

    public function register($data)
    {

        if (isset($_POST['submit'])) {
            $data = [
                "name" => $_POST['name'],
                "email" => $_POST['email'],
                "password" => $_POST['password']
            ];
            try {
                $this->userModel->register($data);
            }catch (PDOException $e){
                echo $e->getMessage();
            }

        }
    }

}