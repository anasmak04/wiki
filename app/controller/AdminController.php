<?php


namespace App\controller;

use App\model\AdminImp;
use Exception;

class AdminController
{

    private $adminImp;

    public function __construct()
    {
        $this->adminImp = new AdminImp();
    }


    public function index()
    {
        require_once "../../views/dashbord.php";
    }
   
    public function Count()
{
    $userCount = $this->adminImp->countUsers();
    $categoryCount = $this->adminImp->countCategoies();
    $wikiCount = $this->adminImp->countWikis();
    $data = $this->adminImp->countWikiPerDay();
    require_once "../../views/dashbord.php";
}

}
