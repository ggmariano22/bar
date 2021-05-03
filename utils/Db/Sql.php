<?php

namespace DB;

class Sql {

    const HOSTNAME = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = 'root';
    const DBNAME = 'db_bar';

    /**
     * @var
     */
    protected $conn;

    public function __construct(){
        $this->conn = new \PDO("mysql:dbname=".Sql::DBNAME.";host=".Sql::HOSTNAME.';charset=utf8',
                                Sql::USERNAME, Sql::PASSWORD);

    }
    
    private function setParams($statement, array $parameters = []){
        
        foreach ($parameters as $key => $value) {
            $statement->bindValue(":$key", $value, \PDO::PARAM_STR);
        }
    }

    public function select($rawQuery, $params = []){
        $stmt = $this->conn->prepare($rawQuery);
        $this->setParams($stmt, $params);
        $stmt->execute();
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function insertOrUpdate($rawQuery, $params = []){
        $stmt = $this->conn->prepare($rawQuery);
        $this->setParams($stmt, $params);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

}