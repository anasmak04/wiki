<?php

namespace App\model;

use App\dao\DataRepository;
use App\dao\AuthRepository;
use App\config\Dbconfig;
use Exception;
use PDOException;


class UserImp implements DataRepository, AuthRepository
{
    private $database;

    public function __construct()
    {
        $this->database = Dbconfig::getInstance()->getConnection();
    }

    public function save($User)
    {
        try {
            $name = $User->getName();
            $username = $User->getUsername();
            $email = $User->getEmail();
            $password = $User->getPassword();
            $image = $User->getImage();
            $linkedin = $User->getLinkedin();
            $github = $User->getGithub();
            $role = 2;

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO `user`(`name`, `username`, `email`, `password`, `image` , `role_id`) VALUES (?,?,?,?,?,?)";
            $statement = $this->database->prepare($query);
            $statement->execute([$name, $username, $email, $hashedPassword, $image, $role]);
            echo "Worked!";
        } catch (PDOException $e) {
            error_log("something went wrong in database : " . $e->getMessage());
        } catch (Exception $e) {
            error_log("Error : " . $e->getMessage());
        }
    }

    public function update($User)
    {
        try {
            $name = $User->getName();
            $username = $User->getUsername();
            $email = $User->getEmail();
            $linkedin = $User->getLinkedin();
            $github = $User->getGithub();
            $id = $User->getId();

            $query = "UPDATE `user` SET `name` = ?, `username` = ?, `email` = ? , `linkedin` = ? , `github` = ? WHERE id = ?";
            $statement = $this->database->prepare($query);
            $statement->execute([$name, $username, $email, $linkedin, $github, $id]);
        } catch (PDOException $e) {
            error_log("Something went wrong in the database: " . $e->getMessage());
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
        }
    }


    public function deleteById($id)
    {
        try {
            $query = "DELETE FROM user WHERE id = ?";
            $statement = $this->database->prepare($query);
            $statement->execute([$id]);
        } catch (PDOException $e) {
            error_log("something went wrong in database : " . $e->getMessage());
        } catch (Exception $e) {
            error_log("Error : " . $e->getMessage());
        }
    }

    public function findAll()
    {
        try {
            $query = "SELECT * FROM user";
            $statement = $this->database->prepare($query);
            $statement->execute();
            $users = $statement->fetchAll();
            return $users;
        } catch (PDOException $e) {
            error_log("something went wrong in database : " . $e->getMessage());
        } catch (Exception $e) {
            error_log("Error : " . $e->getMessage());
        }
    }



    public function findById($id)
    {
        try {
            $query = "SELECT * FROM user WHERE id = ? ";
            $statement = $this->database->prepare($query);
            $statement->execute([$id]);
            $user = $statement->fetch();
            return $user;
        } catch (PDOException $e) {
            error_log("something went wrong in database : " . $e->getMessage());
        } catch (Exception $e) {
            error_log("Error : " . $e->getMessage());
        }
    }



    public function loginUser($User)
    {
        try {
            $email = $User->getEmail();
            $password = $User->getPassword();

            $query = "SELECT u.id AS id_user, u.name AS userName, u.image AS imagep , u.email AS userEmail , r.id AS roleId, u.password 
                  FROM user u 
                  INNER JOIN role r ON u.role_id = r.id 
                  WHERE u.email = ?";
            $statement = $this->database->prepare($query);
            $statement->execute([$email]);
            $user = $statement->fetch();

            if ($user) {
                if (password_verify($password, $user->password)) {
                    session_start();
                    $_SESSION["role"] = $user->roleId;
                    $_SESSION["userId"] = $user->id_user;
                    $_SESSION["username"] = $user->userName;
                    $_SESSION["image"] = $user->imagep;

                    if ($_SESSION["role"] == 2) {
                        header("Location: displayWiki");
                        exit();
                    } else if ($_SESSION["role"] == 1) {
                        header("Location: dashbord");
                        exit();
                    }
                } else {
                    echo "Incorrect password";
                }
            } else {
                echo "Email does not exist";
            }
        } catch (PDOException $e) {
            echo "Something went wrong: " . $e->getMessage();
        }
    }
}
