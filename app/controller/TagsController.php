<?php

namespace App\controller;

use App\entity\Tag;
use App\model\CategoryImp;
use App\model\TagImp;

class TagsController
{


    private $TagsModel;
    private $CategpryModel;

    public function __construct()
    {
        $this->TagsModel = new TagImp();
        $this->CategpryModel = new CategoryImp();
    }


    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submitTag"])) {
            $name = $_POST["name"];
            $tag = new Tag(null, $name);
            $this->TagsModel->save($tag);
        }
    }

    public function index()
    {
        require_once "../../views/tags/tags.php";
    }

    public function getAll()
    {
        $tags = $this->TagsModel->findAll();
        $categories = $this->CategpryModel->findAll();
        require_once "../../views/wiki/index.php";
    }

    public function deleteTag()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
            $id = $_POST["id"];
            $this->TagsModel->deleteById($id);
            header("Location: show");
            exit;
        }
    }

    public function editbyid()
    {
        $id = $_GET["id"];
        $tag = $this->TagsModel->findById($id);
        require_once "../../views/tags/edit.php";
    }

    public function viewtags()
    {
        $tags = $this->TagsModel->findAll();
        require_once("../../views/tags/show.php");
    }


    public function updatetag()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['editsubmit'])) {
            $tag = new Tag(null, null);


            $tag->setId($_POST["id"]);
            $tag->setName($_POST["name"]);
            $this->TagsModel->update($tag);


            header("Location: show");
            exit;
        }
    }
}
