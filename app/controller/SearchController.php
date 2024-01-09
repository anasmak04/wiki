<?php

namespace App\controller;

use App\config\Dbconfig;

class SearchController
{
    private $database;

    public function __construct()
    {
        $this->database = Dbconfig::getInstance()->getConnection();
    }



    public function search()
    {
        if (isset($_GET['q'])) {
            $query = $_GET['q'];
            $stmt = $this->database->prepare("SELECT * FROM annnouce WHERE title LIKE ?");
            $stmt->execute(["%$query%"]);
            $results = $stmt->fetchAll();

            foreach ($results as $row) {
                echo "$row->title";
            }
        }
    }
}
