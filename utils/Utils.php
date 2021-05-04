<?php

namespace Utils;

use DB\Sql;

class Utils{

    public function moneyFormat($value){
        return "R$ ".number_format($value, 2, ',', '.');
    }

    public function usuarioLogado(){
        session_start();
        if(!isset($_SESSION['usuario'])){
            header("Location: /public/login");
            die();
        }
    }

    public function getSelectParams(String $param){
        switch ($param) {
            case 'unidade':
                $sql = "SELECT id, descricao FROM unidade";
                $conn = new Sql;
                return $results = $conn->select($sql);
                break;

            case 'garcom':
                $sql = "SELECT id, nome FROM garcom";
                $conn = new Sql;
                return $results = $conn->select($sql);
                break;
            
            default:
                break;
        }
    }
    
}