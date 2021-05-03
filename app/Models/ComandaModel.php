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
        $results = $this->conn->insertOrUpdate($sql, $params);
        return $results;
    }

    public function finalizaComandaBanco($params = []){
        //var_dump($params);exit;
        $sql = "UPDATE ".$this->tabela." SET ativo = 0 WHERE id_mesa = :id";
        $results = $this->conn->insertOrUpdate($sql, $params);
    }

    
}