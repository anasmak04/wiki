<?php

namespace App\model;

use App\dao\DataRepository;
use App\config\Dbconfig;
use App\entity\Tag;
use App\entity\Wiki;
use Exception;
use PDOException;

session_start();

class WikiImp implements DataRepository
{

    private $database;

    public function __construct()
    {
        $this->database = Dbconfig::getInstance()->getConnection();
    }




    public function save($wiki)
    {
        $currentTimestamp = date('Y-m-d H:i:s');
        try {
            $title = $wiki->getTitle();
            $content = $wiki->getContent();
            $image = $wiki->getImage();
            $date = $currentTimestamp;
            $status = 0;
            $authorId = $_SESSION["userId"];
            $categoryId = $wiki->getCategoryId();

            if (!empty($title) && !empty($content) && !empty($date) && !empty($authorId) && !empty($categoryId)) {

                $query = "INSERT INTO `wiki`(`title`, `content`, `image`, `status` ,`created_at`, `author_id`, `category_id`) VALUES (?,?,?,?,?,?,?)";
                $statement = $this->database->prepare($query);
                $statement->execute([$title, $content, $image, $status, $date, $authorId, $categoryId]);

                $wikiId = $this->database->lastInsertId();

                $tag = new TagImp();
                $tagId = $tag->getLastInsertedId();
                $wikitagQuery = "INSERT INTO `wikitag`(`wiki_id`, `tag_id`) VALUES (?, ?)";
                $wikitagStatement = $this->database->prepare($wikitagQuery);
                $wikitagStatement->execute([$wikiId, $tagId]);
            } else {
                throw new Exception("Required fields are empty.");
            }
        } catch (PDOException $e) {
            error_log("Something went wrong in the database: " . $e->getMessage());
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
        }
    }



    public function update($Wiki)
    {
        try {
            $id = $Wiki->getId();
            $title = $Wiki->getTitle();
            $content = $Wiki->getContent();
            $image = $Wiki->getImage();
            $authorId = $Wiki->getAuthorId();
            $categoryId = $Wiki->getCategoryId();

            $query = "UPDATE `wiki` SET `title` = ?, `content` = ?, `image` = ?, `author_id` = ?, `category_id` = ?, `created_at` = CURRENT_TIMESTAMP WHERE `id` = ?";
            $statement = $this->database->prepare($query);

            $statement->execute([$title, $content, $image, $authorId, $categoryId, $id]);
        } catch (PDOException $e) {
            error_log("Something went wrong in the database: " . $e->getMessage());
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
        }
    }


    public function deleteById($id)
    {
        try {
            $query = "DELETE FROM user WHERE id = ? ";
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
            $query = "SELECT w.* , u.name AS Author, c.name AS categoryName FROM wiki w LEFT JOIN user u ON w.author_id = u.id LEFT JOIN category c ON w.category_id = c.id WHERE status = 1";

            $statement = $this->database->prepare($query);
            $statement->execute();
            $wikis = $statement->fetchAll();
            return $wikis;
        } catch (PDOException $e) {
            error_log("something went wrong in database : " . $e->getMessage());
        } catch (Exception $e) {
            error_log("Error : " . $e->getMessage());
        }
    }


    public function findAll2()
    {
        try {
            $query = "SELECT w.* , u.name AS Author, c.name AS categoryName FROM wiki w LEFT JOIN user u ON w.author_id = u.id LEFT JOIN category c ON w.category_id = c.id";

            $statement = $this->database->prepare($query);
            $statement->execute();
            $wikis = $statement->fetchAll();
            return $wikis;
        } catch (PDOException $e) {
            error_log("something went wrong in database : " . $e->getMessage());
        } catch (Exception $e) {
            error_log("Error : " . $e->getMessage());
        }
    }

    public function findById($id)
    {
        try {
            $query = "SELECT * FROM `wiki` WHERE id = ? ";
            $statement = $this->database->prepare($query);
            $statement->execute([$id]);
            $wiki = $statement->fetch();
            return $wiki;
        } catch (PDOException $e) {
            error_log("something went wrong in database : " . $e->getMessage());
        } catch (Exception $e) {
            error_log("Error : " . $e->getMessage());
        }
    }

    public function deleteById2($wikiId, $userId)
    {
        try {
            $query = "DELETE FROM `wiki` WHERE id = ? AND author_id = ?";
            $statement = $this->database->prepare($query);
            $statement->execute([$wikiId, $userId]);
        } catch (PDOException $e) {
            error_log("Something went wrong in the database: " . $e->getMessage());
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
        }
    }


    public function update3($Wiki)
    {
        try {
            $id = $Wiki->getId();
            $status = $Wiki->getStatus();
            $query = "UPDATE wiki SET status = ? WHERE id = ?";
            $statement = $this->database->prepare($query);
            $statement->execute([$status, $id]);
        } catch (PDOException $e) {
            error_log("Something went wrong in the database: " . $e->getMessage());
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
        }
    }


    public function update2($Wiki, $id)
    {
        try {
            $id = $Wiki->getId();
            $title = $Wiki->getTitle();
            $content = $Wiki->getContent();
            $image = $Wiki->getImage();
            $authorId = $Wiki->getAuthorId();
            $categoryId = $Wiki->getCategoryId();

            $query = "UPDATE `wiki` SET `title` = ?, `content` = ?, `image` = ?, `author_id` = ?, `category_id` = ? WHERE `id` = ? AND author_id = ?";
            $statement = $this->database->prepare($query);

            $statement->execute([$title, $content, $image, $authorId, $categoryId, $id]);
        } catch (PDOException $e) {
            error_log("Something went wrong in the database: " . $e->getMessage());
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
        }
    }


    public function update33($status, $id)
    {
        try {
            $query = "UPDATE `wiki` SET `status` = ? WHERE `id` = ?";
            $statement = $this->database->prepare($query);
            $statement->execute([$status, $id]);
        } catch (PDOException $e) {
            error_log("Something went wrong in the database: " . $e->getMessage());
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
        }
    }
    
}
