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

    public function __construct(){
        $this->conn = new Sql;
    }

    public function getInstance(){
        self::$instance ? self::$instance : self::$instance = new self();
        return self::$instance;
    }

    
}