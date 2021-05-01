<?php

namespace Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Models\AuthModel;

class AuthController extends Controller{

    /**
     * @var AuthModel
     */
    protected $conn;

    public function __invoke(Request $request, Response $response){
        
        session_start();
        if(isset($_SESSION['usuario'])){
            return $response->withRedirect('/public');
        }else{
            return $this->loadView('auth', $response);
        }
        
    }

    public function login(Request $request, Response $response){
        $this->conn = AuthModel::getInstance();
        $dados = $request->getParsedBody();
        $dadosUser = $this->conn->getUser($dados['user'], $dados['pwd']);
        
        foreach ($dadosUser as $dado) {
            $dadosUser['usuario'] =  $dado['usuario'];
            $dadosUser['senha'] =  $dado['senha'];
            unset($dadosUser[0]);
        }

        if(isset($dadosUser['usuario']) && isset($dadosUser['senha'])){
            session_start();
            $_SESSION['usuario'] = $dadosUser['usuario'];
            return $response->withRedirect('/public');
        }else{
            return $response->withRedirect('/public/login');
        }

    }

    public function logout(Request $request, Response $response){
        session_start();
        unset($_SESSION['usuario']);
        return $response->withRedirect('/public/login');
    }

}