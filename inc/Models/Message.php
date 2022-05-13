<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . '../Helpers/Db.php';

class Message extends Db
{
    protected $tableName = 'message';

    public function findAll()
    {
        try {
            $sql = "SELECT * FROM $this->tableName;";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [$e->getCode() => $e->getMessage()];
        }
    }
}
