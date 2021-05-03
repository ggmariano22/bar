<?php

namespace Models;

use DB\Sql;

class MesasModel{

    /**
     * @var Sql
     */
    protected $conn;

    /**
     * @var MesasModel
     */
    protected static $instance;

    /**
     * @var
     */
    private $tabela = 'mesas';

    public function __construct(){
        $this->conn = new Sql;
    }

    public function getInstance(){
        self::$instance ? self::$instance : self::$instance = new self();
        return self::$instance;
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
        
        $sql = 'SELECT m.id, ifnull(c.ativo, 0) as ativo, ifnull(g.nome, "Sem Garçom") as garcom
        FROM mesas m
        LEFT JOIN comanda c on m.id = c.id_mesa
        LEFT JOIN garcom g on c.id_garcom = g.id
        ORDER BY m.id';
        return $results = $this->conn->select($sql);

    }

    public function getDetalheMesa($id){
        $sql = "SELECT m.id, c.ativo, ifnull(g.nome, 'Sem Garçom') as garcom, ifnull(c.qtd_pessoas, 0) as pessoas,
        ifnull(c.qtd_itens, 0) as itens, GROUP_CONCAT(p.descricao) as produtos
        FROM mesas m
        LEFT JOIN comanda c on m.id = c.id_mesa
        LEFT JOIN garcom g on c.id_garcom = g.id
        LEFT JOIN comanda_produto cp on c.id = cp.id_comanda
        LEFT JOIN produtos p on cp.id_produto = p.id
        WHERE m.id = ".$id['id']."
        GROUP BY m.id, ifnull(g.nome, 'Sem Garçom'), ifnull(c.qtd_pessoas, 0),
        ifnull(c.qtd_itens, 0), c.ativo
        ORDER BY m.id";
        return $results = $this->conn->select($sql);
    }

    public function salvaMesaBanco($params = []){
        $params_sql = [
            'unidade' => $params['unidade']
        ];
        $sql = "INSERT INTO ".$this->tabela." (`id_unidade`) VALUES (:unidade)";
        for ($i=0; $i < $params['qtd_mesa'] ; $i++) { 
            $results = $this->conn->insertOrUpdate($sql, $params_sql);
        }

        return $results;
    }

}