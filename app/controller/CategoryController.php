<?php

namespace App\controller;

use App\entity\Category;
use App\model\CategoryImp;

class CategoryController
{
    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryImp();
    }


    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submitCategory"])) {
            $name = $_POST["name"];
            $category = new Category(null, $name);
            $this->categoryModel->save($category);
        }
    }


    public function findAllCategories()
    {
        $categories = $this->categoryModel->findAll();
        if (!empty($categories)) {
            require_once  "../../views/index.php";
        } else {
            echo "Categories not found.";
        }
    }

    public function viewcategory()
    {
        require_once "../../views/category.php";
    }
}
