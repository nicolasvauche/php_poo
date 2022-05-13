<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../Helpers/Db.php';

class Message extends Db
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll()
    {
        try {
            $sql = "SELECT * FROM message;";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [$e->getCode() => $e->getMessage()];
        }
    }
}
