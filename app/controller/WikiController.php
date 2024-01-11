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
                    $wiki = new Wiki(null, $title, $content, $imagePath, null, null, null, $categoryId);
                    $this->wikiModel->save($wiki);
                    header("Location: displayWiki");
                    exit;
                }
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }



    public function findAllWikis()
    {
        $wikis = $this->wikiModel->findAll();
        require_once  "../../views/wiki/displayWiki.php";
    }


    public function detail()
    {
        $id = $_GET["id"];
        $wiki =  $this->wikiModel->findById($id);
        require_once "../../views/wiki/details.php";
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


   public function updateWiki()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
        $wikiId = $_POST['id'];
        $userId = $_SESSION["userId"];

        // Check if a new image file is uploaded
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            // Process the uploaded image file
            $uploadDir = '../../public/uploads/';
            $uploadFile = $uploadDir . basename($_FILES['image']['name']);
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                $imagePath = "/wiki/public/uploads/" . $_FILES['image']['name'];
            } else {
                // Handle the case where moving the uploaded file fails
                // You might want to add proper error handling here
                echo "Failed to move the uploaded image file.";
                exit;
            }
        } else {
            // No new image uploaded, retain the existing image path
            $imagePath = $_POST['image'];
        }

        $wiki = new Wiki(
            $wikiId,
            $_POST['title'],
            $_POST['content'],
            $imagePath,  // Use the updated image path here
            $_POST['status'],
            $_POST['created_at'],
            $userId,
            $_POST['category_id']
        );

        $this->wikiModel->update2($wiki, $userId);
        header("Location: displayWiki");
        exit;
    }
}



    public function updateview()
    {
        $id = $_GET["id"];
        $wiki = $this->wikiModel->findById($id);
        require_once "../../views/wiki/updateview.php";
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
        require_once("../../views/wiki/displayWiki.php");
    }


    public function wiki2()
    {
        require_once("../../views/wiki/displayWiki.php");
    }
}
