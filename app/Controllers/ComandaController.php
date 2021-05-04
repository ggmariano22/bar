<?php

namespace Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Models\ComandaModel;

class ComandaController {

    public function cadastro(Request $request, Response $response){
        $conn = ComandaModel::getInstance();
        $params = $request->getParsedBody();
        $results = $conn->salvaComandaBanco($params);
        return $response->withRedirect('/public');
    }

    public function finaliza(Request $request, Response $response){
        $conn = ComandaModel::getInstance();
        $params = $request->getParsedBody();
        $results = $conn->finalizaComandaBanco($params);
        return $response->withRedirect('/public');
    }

    public function addProduto(){
        
    }
}