<?php

namespace Models;

use DB\Sql;

class GarcomModel{
    
    /**
     * @var Sql
     */
    protected $conn;

    /**
     * @var GarcomModel
     */
    protected static $instance;

    /**
     * @param
     */
    private $tabela = 'garcom';

    public function __construct(){
        $this->conn = new Sql;
    }

    public function getInstance(){
        self::$instance ? self::$instance : self::$instance = new self();
        return self::$instance;
    }

    public function cadastraGarcomBanco($params = []){
        $sql = "INSERT INTO ".$this->tabela." (`nome`, `id_unidade`)
                VALUES (:nome, :id_unidade)";
        $results = $this->conn->insertOrUpdate($sql, $params);
        return $results;

    }

    public function getAll($params = []){
        $sql = "SELECT id, nome, id_unidade, ativo FROM ".$this->tabela;
        $results = $this->conn->select($sql);
        return $results;
    }
}