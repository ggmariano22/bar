<?php

namespace Models;

use DB\Sql;

class MesasModel{

    /**
     * @var
     */
    protected $conn;

    /**
     * @var
     */
    private $tabela = 'mesas';

    public function __construct(){
        $this->conn = new Sql;
    }

    public function getMesas($ativo){
        $sql = $ativo ? 'SELECT count(id) as qtd_mesas FROM '.$this->tabela.' WHERE ativo = 1' : 'SELECT count(id) as qtd_mesas FROM '.$this->tabela;
        return $results = $this->conn->select($sql);

    }

    public function getUnidades($ativo){
        $sql = 'SELECT descricao FROM unidade';
        return $results = $this->conn->select($sql);
    }

    public function getMesaAtiva(){
        $sql = 'SELECT count(id) as mesas from '.$this->tabela.' WHERE ativo = 1';
        $results = $this->conn->select($sql);
        return empty($results) ? 0 : $results;

    }

    public function getMesasDashboard(){
        //$sql = 'SELECT id, ativo FROM '.$this->tabela;
        $sql = 'SELECT m.id, m.ativo, ifnull(g.nome, "Sem Garçom") as garcom
        FROM mesas m
        LEFT JOIN comanda c on m.id = c.id_mesa
        LEFT JOIN garcom g on c.id_garcom = g.id
        ORDER BY m.id';
        return $results = $this->conn->select($sql);

    }

}