<?php


namespace  App\model;


use App\config\Dbconfig;
use App\dao\DataRepository;
use App\entity\Tag;
use Exception;
use PDOException;

class TagImp implements DataRepository
{

    private $database;

    public function __construct()
    {
        $this->database = Dbconfig::getInstance()->getConnection();
    }

    public function save($Tag)
    {
        try {
            $name = $Tag->getName();
            $query = "INSERT INTO `tag`(`name`) VALUES (?)";
            $statement = $this->database->prepare($query);
            $statement->execute([$name]);
            header("Location: dashbord");
            exit();
        } catch (PDOException $e) {
            error_log("Something went wrong in the database: " . $e->getMessage());
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
        }
    }

    public function getLastInsertedId()
    {
        try {
            $query = "SELECT id FROM `tag` ORDER BY id DESC LIMIT 1";
            $statement = $this->database->prepare($query);
            $statement->execute();
            $lastInsertedId = $statement->fetchColumn();
            return $lastInsertedId !== false ? $lastInsertedId : null;
        } catch (PDOException $e) {
            error_log("Something went wrong in the database: " . $e->getMessage());
            return null;
        }
    }


    public function update($entity)
    {
    }
    public function deleteById($id)
    {
    }
    public function findAll()
    {
        try {
            $query = "SELECT * from tag";
            $statement = $this->database->prepare($query);
            $statement->execute();
            $tags = $statement->fetchAll();
            return $tags;
        } catch (PDOException $e) {
            error_log("something went wrong in database : " . $e->getMessage());
        } catch (Exception $e) {
            error_log("Error : " . $e->getMessage());
        }
    }
    public function findById($id)
    {
    }
}