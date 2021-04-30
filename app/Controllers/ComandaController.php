<?php

namespace Controllers;

use Models\ComandaModel;

class ComandaController {

    /**
     * @var ComandaModel
     */
    protected $conn;

    public function __invoke(){
        $this->conn = new ComandaModel;
    }
}