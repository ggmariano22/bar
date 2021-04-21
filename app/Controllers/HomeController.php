<?php

namespace Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Utils\Utils;
use Models\ProdutosModel;

class HomeController {

    /**
     * @var
     */
    protected $conn;

    /**
     * @var
     */
    protected $categories = [
        'Bebidas' => [],
        'Porções' => []
    ];

    public function __invoke(Request $request, Response $response){

        $this->conn = new ProdutosModel;

        $this->produtos = $this->conn->all();

        foreach ($this->produtos as $key => $value) {
            if($this->produtos[$key]['tipo'] == 'Bebidas'){
                array_push($this->categories['Bebidas'], $this->produtos[$key]);
            }else{
                array_push($this->categories['Porções'], $this->produtos[$key]);
            }
        }
        
        return $this->loadView('home', $response);
    }

    public function loadView($view, Response $response){
        
        $pagina = include '../app/Views/'.ucfirst($view).'.php';
        $response->getBody()->getContents($pagina);

        return $response;
    }
}