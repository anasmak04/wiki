<?php

namespace App\controller;

use App\model\UserImp;
use App\entity\User;

class UserController
{
    private $userModel;

    public function __construct()
    {
        $usermodel = new UserImp();
        $this->userModel = $usermodel;
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submitRegister"])) {
            $name = $_POST["name"];
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            $user = new User(null, $name, $username, $email, $password, null, null, null, null);
            $this->userModel->save($user);

            header("Location: http://localhost/wiki/login");
            exit;
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
        require_once   "../../views/index.php";
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
        session_start();
        $userId = $_SESSION["userId"];
        $user = $this->userModel->findById($userId);


        if ($user) {
            require_once  "../../views/profile.php";
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
        require_once "../../views/users.php";
    }


    public function getAllUsers()
    {
        $users =  $this->userModel->findAll();
        require_once "../../views/users.php";
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
