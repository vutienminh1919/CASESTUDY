<?php
require_once __DIR__ . "/vendor/autoload.php";
//include_once "model/UserModel.php";
//include_once "model/NoteModel.php";
//include_once "model/NoteTypeModel.php";
//include_once "controller/NoteController.php";
//include_once "controller/NoteTypeController.php";
//include_once "controller/UserController.php";
//include_once "controller/AuthController.php";
use App\controller\NoteController;
use App\controller\NoteTypeController;
use App\controller\UserController;
use App\controller\AuthController;
use App\controller\NoteTableController;
use App\model\NoteModel;
use App\model\NoteTypeModel;
use App\model\UserModel;
use App\model\NoteTableModel;

//use model\NoteModel;
//use model\NoteTypeModel;


session_start();

$noteModel = new NoteModel();
$noteTypeModel = new NoteTypeModel();
$userModel = new UserModel();
$noteTableModel = new NoteTableModel();
$noteController = new NoteController();
$noteTypeController = new NoteTypeController();
$userController = new UserController();
$noteTableController = new NoteTableController();
$authController = new AuthController();
$page = (isset($_GET["page"])) ? $_GET["page"] : "";
$username = ($_SESSION["username"] ?? "");


?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

<?php if ($_SESSION['username']) :?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">I NOTES</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Function
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?page=note-list">Note</a></li>
                        <li><a class="dropdown-item" href="index.php?page=noteType-list">Note type</a></li>
                        <li><a class="dropdown-item" href="index.php?page=user-list">User list</a></li>
                        <li><a class="dropdown-item" href="index.php?page=noteTables">Notes Detail</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="index.php?page=logout">LOG OUT</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Hello: <?php echo $username; ?></a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>

</nav>
<?php endif; ?>
<?php
switch ($page) {
    case "note-list":
        $authController->checkAuth();
        $noteController->index();

        break;
    case "note-create":
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $noteController->showFormCreate();
        } else {
            $noteController->create($_REQUEST);
        }
        break;
    case "note-detail":
        $id = $_GET["id"];
        $noteController->showDetail($id);
        break;
    case "note-delete":
        $id = $_GET["id"];
        $noteController->delete($id);
        header("Location:index.php");
        break;
    case "note-edit":
        $id = $_GET["id"];
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $noteController->showFormEdit();
        } else {
            $noteController->edit($id, $_REQUEST);
        }
        break;
    case "noteType-list":
        $authController->checkAuth();
        $noteTypeController->index();
        break;
    case "noteType-create":
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $noteTypeController->showFormCreate();
        } else {
            $noteTypeController->create($_REQUEST);
        }
        break;
    case "noteType-detail":
        $id = $_GET["id"];
        $noteTypeController->showDetail($id);
        break;
    case "noteType-delete":
        $id = $_GET["id"];
        $noteTypeController->delete($id);
        header("Location:index.php?page=noteType-list");
        break;
    case "noteType-edit":
        $id = $_GET["id"];
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $noteTypeController->showFormEdit();
        } else {
            $noteTypeController->edit($id, $_REQUEST);
        }
        break;
    case "user-list":
        $authController->checkAuth();
        $userController->index();
        break;
    case "user-delete":
        $id = $_GET["id"];
        $userController->delete($id);
        header("Location:index.php?page=user-list");
        break;
    case "user-edit":
        $id = $_GET["id"];
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $userController->showFormEdit();
        } else {
            $userController->edit($id, $_REQUEST);
//            header("Location:index.php?page=user-list");
        }
        break;
    case "noteTables":
        $authController->checkAuth();
        $noteTableController->index();
        break;
    case "login":
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $authController->showFormLogin();
        } else {
            $authController->login($_REQUEST);
        }
        break;
    case "logout":
        $authController->logout();
        break;
    case "register":
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $authController->showFormRegister();
        } else {
            $authController->register();
            header("Location:index.php?page=login");
        }
        break;

    default:
        $noteController->index();
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>-->
</body>
</html>

