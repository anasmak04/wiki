<?php


namespace App\controller;

use App\entity\Wiki;
use App\model\AdminImp;
use App\model\WikiImp;
use Exception;

class AdminController
{

    private $adminImp;
    private $wikiModel;


    public function __construct()
    {
        $this->adminImp = new AdminImp();
        $this->wikiModel = new WikiImp();
    }


    public function index()
    {
        require_once "../../views/admin/dashboard.php";
    }

    public function Count()
    {
        $userCount = $this->adminImp->countUsers();
        $categoryCount = $this->adminImp->countCategoies();
        $wikiCount = $this->adminImp->countWikis();
        $data = $this->adminImp->countWikiPerDay();
        $tagCount = $this->adminImp->countTags();
        require_once "../../views/admin/dashboard.php";
    }


    public function findAllWikis()
    {
        $wikis = $this->wikiModel->findAll2();
        require_once "../../views/admin/wikiAdmin.php";
    }

    public function routewiki()
    {
        require_once "../../views/admin/wikiAdmin.php";
    }


    public function editview()
    {
        $id = $_GET["id"];
        $wiki = $this->wikiModel->findById($id);
        require_once "../../views/admin/Editview.php";
    }


    public function adminupdatewiki()
    {

        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
            $wiki = new Wiki(null, null, null, null, null, null, null, null);
            $wiki->setId($_POST['id']);
            $wiki->setStatus($_POST["status"]);
            $this->wikiModel->update3($wiki);
            header("Location: dashboard");
            exit;
        }
    }

    public function archiver()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST["id"];
            $status = 0;
            $this->wikiModel->update33($status, $id);
            header("Location: displayWiki");
            exit;
        } else {
            echo "noot works";
        }
    }
}
