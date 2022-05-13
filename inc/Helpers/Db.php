<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../../config/db.php';

class Db
{
    protected $dbHost;
    protected $dbName;
    protected $dbUser;
    protected $dbPassword;
    protected $pdo;

    public function __construct()
    {
        $this->dbHost = getenv('DB_HOST');
        $this->dbName = getenv('DB_NAME');
        $this->dbUser = getenv('DB_USER');
        $this->dbPassword = getenv('DB_PASSWORD');

        $this->connect();
    }

    public function connect()
    {
        $dsn = "mysql:host=$this->dbHost;dbname=$this->dbName;charset=UTF8";

        try {
            $this->pdo = new PDO($dsn, $this->dbUser, $this->dbPassword);
            if ($this->pdo) {
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        } catch (PDOException $e) {
            echo $e->getCode() . ' ' . $e->getMessage();
            exit;
        }
    }
}
