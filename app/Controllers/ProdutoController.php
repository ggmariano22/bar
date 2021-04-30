<?php

namespace Controllers;

use Utils\Utils;
use Models\ProdutosModel;

class ProdutoController{


    public function getProdutos(){

        $conn = ProdutosModel::getInstance();

        $produtos = $conn->allProduto();
        $tipos = $conn->allTipo();

        foreach ($tipos as $key => $value) {
            $categories[$value['descricao']] = [];
        }

        foreach ($categories as $keyC => $valueC) {
            foreach ($produtos as $key => $value) {
                if($produtos[$key]['tipo'] == $keyC){
                    array_push($categories[$keyC], $produtos[$key]);
                }
            }
        }

        return $categories;
    }

}