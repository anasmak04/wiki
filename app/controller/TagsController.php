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
        require_once "../../views/tags.php";
    }

    public function getAll(){
        $tags = $this->TagsModel->findAll();
        $categories = $this->CategpryModel->findAll();
        require_once "../../views/index.php";
    }
}
