<?php

namespace App\config;

use PDO;
use PDOException;

require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

class Dbconfig
{

    private $username;
    private $password;
    private $dbname;
    private $servername;
    private $db;
    private static $instance;

    /**
     * @param $username
     * @param $password
     * @param $dbname
     * @param $servername
     * @param $db
     */
    public function __construct()
    {
        $this->username = $_ENV["DB_username"];
        $this->password = $_ENV["DB_password"];
        $this->dbname =  $_ENV["DB_dbname"];
        $this->servername = $_ENV["DB_servername"];

        try {
            $this->db = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->db;
    }
}
