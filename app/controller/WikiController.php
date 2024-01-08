<?php

namespace App\Controller;

use App\entity\User;
use App\Model\WikiImp;
use App\Entity\Wiki;
use App\model\CategoryImp;
use App\model\UserImp;
use Exception;

class WikiController
{
    private $wikiModel;

    public function __construct()
    {
        $this->wikiModel = new WikiImp();
    }

    public function save()
    {
        try {
            if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST["submitWiki"])) {
                $title = $_POST["title"];
                $content = $_POST["content"];
                $categoryId = $_POST["category_id"];

                $uploadDir = '../../public/uploads/';
                $uploadFile = $uploadDir . basename($_FILES['image']['name']);

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                    $imagePath = "/wiki/public/uploads/" . $_FILES['image']['name'];
                    $wiki = new Wiki(null, $title, $content, $imagePath, null, null, $categoryId);
                    $this->wikiModel->save($wiki);
                    header("Location: displayWiki");
                    exit;
                } else {
                    echo "Image upload failed";
                }
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function findAllWikis()
    {
        $wikis = $this->wikiModel->findAll();
        if (!empty($wikis)) {
            require_once  "../../views/displayWiki.php";
        } else {
            echo "wikis not found.";
        }
    }


    public function deleteWiki()
    {
        
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
            $wikiId = $_POST['id'];
            $userId = $_SESSION["userId"];

           
            $this->wikiModel->deleteById2($wikiId, $userId);
            header("Location: displayWiki");
            exit;
        }
    }


    public function updateWiki(){
          
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
            $wikiId = $_POST['id'];
            $userId = $_SESSION["userId"];
            $this->wikiModel->update2($wikiId, $userId);
            header("Location: displayWiki");
            exit;
        }
    }
    

    public function updateview() {
        $id = $_GET["id"];
        $wiki = $this->wikiModel->findById($id);
        require_once "../../views/updateview.php";
    }
    


    // public function findByIdUser(){
    //     $model = new UserImp();

    //     // $user = $model->findById();

    //     // if ($user) {
    //     //     header("Location: http://localhost/wiki/displayWiki");

    //     // } else {
    //     //     echo "<p>User: Not found</p>";
    //     // }
    // }


    public function wiki()
    {

        require_once("../../views/displayWiki.php");
    }
}
