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
            $query = '%' . $_GET['q'] . '%';
            $stmt = $this->database->prepare("SELECT w.title, w.content, c.name as category_name, t.name as tag_name
                FROM wiki w
                LEFT JOIN category c ON w.category_id = c.id
                JOIN wikiTag wt ON w.id = wt.wiki_id
                JOIN tag t ON wt.tag_id = t.id
                WHERE w.title LIKE ? OR c.name LIKE ? OR t.name LIKE ?;
            ");
            $stmt->execute([$query, $query, $query]);
            $results = $stmt->fetchAll();

            header('Content-Type: application/json');
            echo json_encode($results);
            exit();
        }
    }
}
