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

    public function all(){
        $sql = 'SELECT t.descricao as tipo, p.descricao as produto, p.valor
                FROM '.$this->tabela.' p
                join tipo t on p.id_tipo = t.id';
        return $results = $this->conn->select($sql);
    }
}