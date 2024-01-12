<?php


namespace  App\services;

use App\dao\DataRepository;
use App\entity\Category;
use App\config\Dbconfig;
use Exception;
use PDOException;

class CategoryImp implements DataRepository
{
    private $database;

    public function __construct()
    {
        $this->database = Dbconfig::getInstance()->getConnection();
    }


    public function save($category)
    {
        try {
            $name = $category->getName();
            $query = "INSERT INTO `category`(`name`) VALUES (?)";
            $statement = $this->database->prepare($query);
            $statement->execute([$name]);
            header("Location: dashboard");
            exit();
        } catch (PDOException $e) {
            error_log("Something went wrong in the database: " . $e->getMessage());
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
        }
    }

    public function findById($id)
    {
        try {

            $query = "SELECT * FROM category WHERE id = ? ";
            $statement = $this->database->prepare($query);
            $statement->execute([$id]);
            $category = $statement->fetch();
            return $category;
        } catch (PDOException $e) {
            error_log("something went wrong in database : " . $e->getMessage());
        } catch (Exception $e) {
            error_log("Error : " . $e->getMessage());
        }
    }


    public function update($Category)
    {
        try {

            $name = $Category->getName();
            $id = $Category->getId();
            $query = "UPDATE `category` SET `name` = ? WHERE `id` = ?";
            $statemnt = $this->database->prepare($query);
            $statemnt->execute([$name, $id]);
        } catch (PDOException $e) {
            error_log("something went wrong in database : " . $e->getMessage());
        } catch (Exception $e) {
            error_log("Error : " . $e->getMessage());
        }
    }

    public function deleteById($id)
    {
        try {

            $query = "DELETE FROM `category` WHERE id = ?";
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
            $query = "SELECT id, name FROM `category`";
            $statement = $this->database->prepare($query);
            $statement->execute();
            $categories = $statement->fetchAll();
            return $categories;
        } catch (PDOException $e) {
            error_log("Something went wrong in the database : " . $e->getMessage());
        } catch (Exception $e) {
            error_log("Error : " . $e->getMessage());
        }
    }
}
