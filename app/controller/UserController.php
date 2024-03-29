<?php

namespace App\controller;

use App\entity\User;
use App\services\UserImp;
use App\services\WikiImp;

class UserController
{
    private $userModel;
    private $wikiModel;

    public function __construct()
    {
        $usermodel = new UserImp();
        $wikimodel = new  WikiImp();
        $this->userModel = $usermodel;
        $this->wikiModel = $wikimodel;
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submitRegister"])) {
            $name = $_POST["name"];
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $uploadDir = '../../public/uploads/';
            $uploadFile = $uploadDir . basename($_FILES['image']['name']);

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                $imagePath = "/wiki/public/uploads/" . $_FILES['image']['name'];
                session_start();
                $_SESSION['temp_image_path'] = $imagePath;
                $user = new User(null, $name, $username, $email, $password, $imagePath, null, null, null);
                $this->userModel->save($user);
                header("Location: http://localhost/wiki/login");
                exit;
            } else {
                echo "no images";
            }
        }
    }

    public function viewRegister()
    {
        require_once  "../../views/authentification/Register.php";
    }


    public function viewLogin()
    {
        require_once   "../../views/authentification/Login.php";
    }

    public function viewHome()
    {
        require_once   "../../views/wiki/index.php";
    }


    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submitLogin"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $user = new User(null, null, null, $email, $password, null, null, null, null);
            $this->userModel->loginUser($user);
        }
    }

    public function viewProfile()
    {
        $userId = $_SESSION["userId"];
        $user = $this->userModel->findById($userId);


        if ($user) {
            require_once  "../../views/client/profile.php";
        } else {
            echo "User not found.";
        }
    }

    public function profileview()
    {
        $userId = $_SESSION["userId"];
        $user = $this->userModel->findById($userId);
        $authorid = $_SESSION["userId"];
        $wikis = $this->wikiModel->findWikisByAuthor($authorid);

        if ($user) {
            require_once  "../../views/client/profile-view.php";
        } else {
            echo "User not found.";
        }
    }


    public function updateProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submitUpdate"])) {
            session_start();
            $userId = $_SESSION["userId"];
            $user = new User(null, null, null, null, null, null, null, null, null);
            $user->setId($userId);

            $user->setName($_POST["name"]);
            $user->setUsername($_POST["username"]);
            $user->setEmail($_POST["email"]);
            $user->setLinkedin($_POST["linkedin"]);
            $user->setGithub($_POST["github"]);

            $this->userModel->update($user);

            header("Location: profile");
            exit;
        }
    }

    public function viewAdmin()
    {
        require_once "../../views/client/users.php";
    }


    public function getAllUsers()
    {
        $users =  $this->userModel->findAll();
        require_once "../../views/client/users.php";
    }

    public function logoutview()
    {
        session_start();
        session_destroy();
        header("Location: login");
        exit;
    }


    public function deleteUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["id"])) {
            $id = $_POST["id"];
            $this->userModel->deleteById($id);
            header("Location: users");
            exit;
        }
    }
}
