<?php

namespace Models;

use DB\Sql;

class ProdutosModel{

    /**
     * @var
     */
    protected $conn;

    /**
     * @var
     */
    private $tabela = 'produtos';

    public function __construct(){
        $this->conn = new Sql;
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
}