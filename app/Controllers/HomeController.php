<?php

namespace Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Controllers\{ProdutoController, MesaController};

class HomeController extends Controller{

    /**
     * @param array
     */
    protected $mesas = [];

    public function __invoke(Request $request, Response $response){

        session_start();
        if(!isset($_SESSION['usuario'])){
            return $response->withRedirect('/public/login');
        }
        
        $this->categories = ProdutoController::getProdutos();
        $this->mesas = MesaController::mesasHome();
        //var_dump($this->mesas);exit;
        
        return $this->loadView('home', $response);
    }
}