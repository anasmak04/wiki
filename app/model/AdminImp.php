<?php


namespace  App\model;

use App\config\Dbconfig;
use App\dao\AdminRepository;
use PDO;

class AdminImp implements AdminRepository
{

    private $database;

    public function __construct()
    {
        $this->database = Dbconfig::getInstance()->getConnection();
    }



    public function countUsers()
    {
        $query = "SELECT COUNT(*) AS total_users FROM user";
        $statement = $this->database->prepare($query);
        $statement->execute();
        $userCount = $statement->fetch();
        return $userCount;
    }

    public function countCategoies()
    {
        $query = "SELECT COUNT(*) AS total_categories FROM category";
        $statement = $this->database->prepare($query);
        $statement->execute();
        $categoryCount = $statement->fetch();
        return $categoryCount;
    }

    public function countWikis()
    {
        $query = "SELECT COUNT(*) AS total_wikis FROM wiki";
        $statement = $this->database->prepare($query);
        $statement->execute();
        $wikiCount = $statement->fetch();
        return $wikiCount;
    }

    public function countWikiPerDay(){
        $query = "SELECT MONTHNAME(created_at) AS monthname, COUNT(*) AS wikicount FROM wiki GROUP BY monthname ORDER BY MONTH(created_at)";
        $statement = $this->database->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}
