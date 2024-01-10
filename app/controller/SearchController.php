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
            $stmt = $this->database->prepare("SELECT title, content FROM `wiki` WHERE title LIKE ?");
            $stmt->execute(["%$query%"]);
            $results = $stmt->fetchAll();

            $data = [];
            foreach ($results as $row) {
                $data[] = [
                    'title' => $row->title,
                    'content' => $row->content
                ];
            }

            header('Content-Type: application/json');
            echo json_encode($data);
            exit();
        }
    }
}
