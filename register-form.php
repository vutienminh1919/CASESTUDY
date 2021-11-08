<?php

use App\model\Db;

include_once "app/view/const.php";
include_once "./app/model/Db.php";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (validate($_POST)) {
        $_SESSION['user'] = $_POST;
        header("Location:view/login.php");
    }
}
if (isset($_SESSION["errors"])) {
    $errors = $_SESSION["errors"];
    session_destroy();
}
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rPassword = $_POST['password-repeat'];
    $db = new Db();
    try {
        $sql = "INSERT INTO users(name,email,password) VALUES (:name,:email,:password)";
        $stmt = $db->connect()->prepare($sql);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function validate($data): bool
{
    $errors = [];
    if ($data["name"] == "") {
        $errors["name"] = USERNAME_REQUIRE;
    }
    if ($data["email"] == "") {
        $errors["email"] = EMAIL_REQUIRE;
    } elseif (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = EMAIL_INVALID;
    }
    if ($data["password"] == "") {
        $errors["password"] = PASSWORD_REQUIRE;
    }
//    } elseif (!checkPassword($data['password'])) {
//        $errors["password"] = PASSWORD_INVALID;
//    }

    if ($data["password-repeat"] == "") {
        $errors["password-repeat"] = PASSWORD_REPEAT_REQUIRE;
    } elseif ($data["password-repeat"] !== $data["password"]) {
        $errors["password-repeat"] = PASSWORD_REPEAT_NOT_MATCH;
    }
    if (count($errors) > 0) {
        $_SESSION["errors"] = $errors;
    }
    return count($errors) == 0;
}

//function checkPassword($password): bool
//{
//    $pattern = '/[a-zA-Z0-9]{8,}/';
//    $strongPassword = preg_match($pattern, $password);
//    if (!$strongPassword) {
//        return false;
//    } else {
//        return true;
//    }
//
//}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<style>
    *, *:before, *:after {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    body {
        font-family: 'Nunito', sans-serif;
        color: #384047;
    }

    form {
        max-width: 300px;
        margin: 10px auto;
        padding: 10px 20px;
        background: #f4f7f8;
        border-radius: 8px;
    }

    h1 {
        margin: 0 0 30px 0;
        text-align: center;
    }

    input[type="text"],
    input[type="password"],
    input[type="date"],
    input[type="datetime"],
    input[type="email"],
    input[type="number"],
    input[type="search"],
    input[type="tel"],
    input[type="time"],
    input[type="url"],
    textarea,
    select {
        background: rgba(255, 255, 255, 0.1);
        border: none;
        font-size: 16px;
        height: auto;
        margin: 0;
        outline: 0;
        padding: 15px;
        width: 100%;
        background-color: #e8eeef;
        color: #8a97a0;
        box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
        /*margin-bottom: 30px;*/

    }

    input[type="radio"],
    input[type="checkbox"] {
        margin: 0 4px 8px 0;
    }

    select {
        padding: 6px;
        height: 32px;
        border-radius: 2px;
    }

    p {
        color: red;
    }

    button {
        padding: 19px 39px 18px 39px;
        color: #FFF;
        background-color: #4bc970;
        font-size: 18px;
        text-align: center;
        font-style: normal;
        border-radius: 5px;
        width: 100%;
        border: 1px solid #3ac162;
        border-width: 1px 1px 3px;
        box-shadow: 0 -1px 0 rgba(255, 255, 255, 0.1) inset;
        margin-bottom: 10px;
    }

    fieldset {
        margin-bottom: 30px;
        border: none;
    }

    legend {
        font-size: 1.4em;
        margin-bottom: 10px;
    }

    label {
        display: block;
        margin-bottom: 8px;
    }

    label.light {
        font-weight: 300;
        display: inline;
    }

    .number {
        background-color: #5fcf80;
        color: #fff;
        height: 30px;
        width: 30px;
        display: inline-block;
        font-size: 0.8em;
        margin-right: 4px;
        line-height: 30px;
        text-align: center;
        text-shadow: 0 1px 0 rgba(255, 255, 255, 0.2);
        border-radius: 100%;
    }

    @media screen and (min-width: 480px) {

        form {
            max-width: 480px;
        }

    }

</style>
<body>
<div class="row">
    <div class="col-md-12">
        <form action="" method="post">
            <h1> Sign Up </h1>
            <fieldset>

                <input type="text" id="name" name="name" placeholder="Enter your name"><br>
                <p><?php echo $errors["name"] ?? "" ?></p>
                <input type="email" id="mail" name="email" placeholder="Enter your email"><br>
                <p><?php echo $errors['email'] ?? "" ?></p>

                <input type="password" id="password" name="password" placeholder="Enter your password"><br>
                <p><?php echo $errors['password'] ?? "" ?></p>

                <input type="password" id="rePassword" name="password-repeat" placeholder="Re-enter your password"><br>
                <p><?php echo $errors['password-repeat'] ?? "" ?></p>

                <input type="checkbox"><span>I agree to the Privacy Policy</span>

            </fieldset>
            <button type="submit" name="submit">Sign Up</button>

        </form>
    </div>
</div>


</body>
</html>

