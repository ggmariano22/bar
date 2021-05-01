<?php

namespace Models;

use DB\Sql;

class ComandaModel {

    /**
     * @var Sql
     */
    protected $conn;

    /**
     * @var ComandaModel
     */
    protected static $instance;

    /**
     * @param
     */
    private $tabela = 'comanda';

    public function __construct(){
        $this->conn = new Sql;
    }

    public function getInstance(){
        self::$instance ? self::$instance : self::$instance = new self();
        return self::$instance;
    }

    public function salvaComandaBanco($params = []){
        $sql = "INSERT INTO ".$this->tabela." (`id_mesa`, `id_garcom`, `qtd_pessoas`, `qtd_itens`) 
                VALUES (:mesa, :garcom, :ocupantes, :garcom)";
        $results = $this->conn->insert($sql, $params);
        return $results;
    }

    
}