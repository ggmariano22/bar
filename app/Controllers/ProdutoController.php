<?php

namespace Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Utils\Utils;
use Models\ProdutosModel;

class ProdutoController extends Controller{

    /**
     * @param array
     */
    protected $categories = [];

    public function __invoke(Request $request, Response $response){
        $conn = ProdutosModel::getInstance();
        $this->categories = $this->getProdutos();
        return $this->loadView('produtos', $response);
    }
    
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

    public function cadastro(Request $request, Response $response){
        $conn = ProdutosModel::getInstance();
        $params = $request->getParsedBody();
        $results = $conn->cadastraProdBanco($params);
        return $response->withRedirect('/public/produtos');
    }

    public function inativa(Request $request, Response $response, $id){
        $conn = ProdutosModel::getInstance();
        $results = $conn->inativaProduto($id);
        return $response->withRedirect('/public/produtos');
    }

}