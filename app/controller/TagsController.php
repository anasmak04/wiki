<?php

namespace App\controller;

use App\entity\Tag;
use App\model\TagImp;

class TagsController
{


    private $TagsModel;

    public function __construct()
    {
        $this->TagsModel = new TagImp();
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
}
