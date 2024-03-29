<?php

namespace App\controller;

use App\entity\Category;
use App\services\CategoryImp;

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
            echo '<script>alert("Welcome to Geeks for Geeks")</script>';
        }
    }

    public function getAllcategories2()
    {
        $categories = $this->categoryModel->findAll();
        require_once("../../views/wiki/updateview.php");
    }



    public function getAllcategories()
    {
        $categories = $this->categoryModel->findAll();
        require_once("../../views/category/view.php");
    }

    public function deleteCategory()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
            $id = $_POST["id"];
            $this->categoryModel->deleteById($id);
            header("Location: categories");
            exit;
        }
    }


    public function view()
    {
        require_once("../../views/category/view.php");
    }


    public function findAllCategories()
    {
        $categorie = $this->categoryModel->findAll();

        require_once  "../../views/wiki/updateview.php";
    }

    public function viewcategory()
    {
        require_once "../../views/category/category.php";
    }


    public function edit()
    {
        $id = $_GET["id"];
        $category = $this->categoryModel->findById($id);
        require_once "../../views/category/edit.php";
    }


    public function editc()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['editsubmit'])) {
            $category = new Category(null, null);
            $category->setName($_POST["name"]);
            $this->categoryModel->update($category);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editsubmit'])) {
            $category = new Category(null, "");
            $category->setId($_POST['id']);
            $category->setName($_POST['name']);
            $this->categoryModel->update($category);
            header("Location: categories");
            exit;
        }
    }
}
