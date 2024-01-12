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

                $query = "INSERT INTO `wiki`(`title`, `content`, `image`, `status`, `created_at`, `author_id`, `category_id`) VALUES (?,?,?,?,?,?,?)";
                $statement = $this->database->prepare($query);
                $statement->execute([$title, $content, $image, $status, $date, $authorId, $categoryId]);


                $wikiId = $this->database->lastInsertId();

                $selectedTagIds = $_POST['tags'] ?? [];

                if (!empty($wikiId) && !empty($selectedTagIds)) {
                    foreach ($selectedTagIds as $tagId) {
                        $wikitagQuery = "INSERT INTO `wikitag`(`wiki_id`, `tag_id`) VALUES (?, ?)";
                        $wikitagStatement = $this->database->prepare($wikitagQuery);
                        $wikitagStatement->execute([$wikiId, $tagId]);
                    }
                } else {
                    throw new Exception("No tags selected or wiki ID missing.");
                }
            } else {
                throw new Exception("Required fields are empty.");
            }
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

            $statement->execute([$title, $content, $image, $authorId, $categoryId, $id, $authorId]);
        } catch (PDOException $e) {
            error_log("Something went wrong in the database: " . $e->getMessage());
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
        }
    }


    /// update wiki
    //  public function update2($Wiki, $id)
    //  {
    //      try {
    //          $id = $Wiki->getId();
    //          $title = $Wiki->getTitle();
    //          $content = $Wiki->getContent();
    //          $image = $Wiki->getImage();
    //          $authorId = $Wiki->getAuthorId();
    //          $categoryId = $Wiki->getCategoryId();

    //          $this->database->beginTransaction(); // Start a transaction

    //          // Step 1: Update wiki details
    //          $query = "UPDATE `wiki` SET `title` = ?, `content` = ?, `image` = ?, `author_id` = ?, `category_id` = ? WHERE `id` = ? AND author_id = ?";
    //          $statement = $this->database->prepare($query);
    //          $statement->execute([$title, $content, $image, $authorId, $categoryId, $id, $authorId]);

    //          // Step 2: Delete existing tag associations
    //          $deleteTagsQuery = "DELETE FROM `wikitag` WHERE `wiki_id` = ?";
    //          $deleteTagsStatement = $this->database->prepare($deleteTagsQuery);
    //          $deleteTagsStatement->execute([$id]);

    //          // Step 3: Insert new tag associations
    //          $selectedTagIds = $_POST['tags'] ?? [];
    //          foreach ($selectedTagIds as $tagId) {
    //              $wikitagQuery = "INSERT INTO `wikitag`(`wiki_id`, `tag_id`) VALUES (?, ?)";
    //              $wikitagStatement = $this->database->prepare($wikitagQuery);
    //              $wikitagStatement->execute([$id, $tagId]);
    //          }

    //          $this->database->commit(); // Commit the transaction
    //      } catch (PDOException $e) {
    //          $this->database->rollBack(); // Rollback the transaction if an exception occurs
    //          error_log("Something went wrong in the database: " . $e->getMessage());
    //      } catch (Exception $e) {
    //          $this->database->rollBack(); // Rollback the transaction if an exception occurs
    //          error_log("Error: " . $e->getMessage());
    //      }
    //  }




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

    public function findWikisByAuthor($authorId)
    {
        try {
            $query = "SELECT w.id, w.title, w.content, w.image, w.status, w.created_at, w.author_id, u.email AS user_email, c.name AS category_name, GROUP_CONCAT(t.name SEPARATOR '#') AS tag_names FROM wiki w JOIN user u ON w.author_id = u.id JOIN category c ON w.category_id = c.id JOIN wikiTag wt ON w.id = wt.wiki_id JOIN tag t ON wt.tag_id = t.id WHERE w.status = 1 AND w.author_id = 3 GROUP BY w.id, w.title, w.content, w.image, w.status, w.created_at, w.author_id, u.email, c.name ORDER BY w.created_at DESC;";

            $statement = $this->database->prepare($query);
            $statement->execute([$authorId]);
            $wikis = $statement->fetchAll();
            return $wikis;
        } catch (PDOException $e) {
            error_log("something went wrong in database: " . $e->getMessage());
        } catch (Exception $e) {
            error_log("Error: " . $e->getMessage());
        }
    }


    public function findAll()
    {
        try {
            $query = "SELECT w.id, w.title, w.content, w.image, w.status, w.created_at, w.author_id, u.email AS user_email, c.name AS category_name, GROUP_CONCAT(t.name SEPARATOR '#') AS tag_names FROM wiki w JOIN user u ON w.author_id = u.id JOIN category c ON w.category_id = c.id JOIN wikiTag wt ON w.id = wt.wiki_id JOIN tag t ON wt.tag_id = t.id WHERE w.status = 1 GROUP BY w.id, w.title, w.content, w.image, w.status, w.created_at, w.author_id, u.email, c.name ORDER BY w.created_at DESC;";

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
            $query = "SELECT w.*, u.name AS Author, c.name AS categoryName
            FROM wiki w
            INNER JOIN user u ON w.author_id = u.id
            INNER JOIN category c ON w.category_id = c.id;
            ";

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
            $query = "SELECT w.id, w.title, w.content, w.image as image, w.status, w.created_at, w.author_id, u.email AS user_email, u.name AS user_name, u.linkedin AS user_linkedin, u.email AS user_github, c.name AS category_name, c.id AS category_id, GROUP_CONCAT(t.name SEPARATOR '#') AS tag_names FROM wiki w JOIN user u ON w.author_id = u.id JOIN category c ON w.category_id = c.id LEFT JOIN wikiTag wt ON w.id = wt.wiki_id LEFT JOIN tag t ON wt.tag_id = t.id  WHERE  w.status = 1 AND w.id = ?  GROUP BY w.id, w.title, w.content, w.image, w.status, w.created_at, w.author_id, u.email, c.name;
        ";
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


    public function findById2($id)
    {
        try {
            $query = "SELECT 
            w.id,
            w.title,
            w.content,
            w.image,
            w.status,
            w.created_at,
            w.author_id,
            u.email AS user_email,
            u.name AS user_name,
            u.linkedin AS user_linkedin,
            u.email AS user_github,
            c.name AS category_name,
            GROUP_CONCAT(t.name SEPARATOR '#') AS tag_names
        FROM 
            wiki w
        JOIN 
            user u ON w.author_id = u.id
        JOIN 
            category c ON w.category_id = c.id
        JOIN 
            wikiTag wt ON w.id = wt.wiki_id
        JOIN 
            tag t ON wt.tag_id = t.id 
        WHERE 
            w.id = ? 
        GROUP BY 
            w.id, w.title, w.content, w.image, w.status, w.created_at, w.author_id, u.email, c.name;
        ";
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
