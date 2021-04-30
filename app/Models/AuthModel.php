<?php

namespace Models;

use DB\Sql;

class AuthModel{

    /**
     * @var Sql
     */
    protected $conn;
    
    /**
     * @var AuthModel
     */
    protected static $instance;

    /**
     * @var
     */
    protected $tabela = 'usuarios';

    public function __construct(){
        $this->conn = new Sql;
    }

    public function getInstance(){
        self::$instance ? self::$instance : self::$instance = new self();
        return self::$instance;
    }

    public function getUser($username, $password){
        $params = [
            'usuario' => $username,
            'senha' => md5($password)
        ];

        $sql = "SELECT usuario, senha FROM ".$this->tabela."
                WHERE usuario = :usuario AND senha = :senha";
        
        return $results = $this->conn->select($sql, $params);
    }
}