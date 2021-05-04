<?php

namespace Models;

use DB\Sql;

class ProdutosModel{

    /**
     * @var Sql
     */
    protected $conn;

    /**
     * @var ProdutosModel
     */
    protected static $instance;

    private $tabela = 'produtos';

    public function __construct(){
        $this->conn = new Sql;
    }

    public function getInstance(){
        self::$instance ? self::$instance : self::$instance = new self();
        return self::$instance;
    }

    public function allProduto(){
        $sql = 'SELECT p.id, t.descricao as tipo, p.descricao as produto, p.valor
                FROM '.$this->tabela.' p
                JOIN tipo t on p.id_tipo = t.id
                WHERE p.ativo = 1';
        return $results = $this->conn->select($sql);
    }

    public function allTipo(){
        $sql = 'SELECT DISTINCT descricao FROM tipo WHERE ativo = 1';
        return $results = $this->conn->select($sql);
    }

    public function cadastraProdBanco($params = []){
        $sql = "INSERT INTO ".$this->tabela." (`descricao`, `id_tipo`, `valor`)
                VALUES (:descricao, :id_tipo, :valor)";
        $results = $this->conn->insertOrUpdate($sql, $params);
        return $results;
    }

    public function inativaProduto($params = []){
        $sql = "UPDATE ".$this->tabela." SET ativo = 0 WHERE id = :id";
        $results = $this->conn->insertOrUpdate($sql, $params);
        return $results;
    }
}