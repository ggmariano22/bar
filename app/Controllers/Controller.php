<?php

namespace Controllers;

use \Psr\Http\Message\ResponseInterface as Response;

class Controller{
    
    public function loadView($view, Response $response){
        
        $pagina = include '../app/Views/'.ucfirst($view).'.php';
        $response->getBody()->getContents($pagina);

        return $response;
    }
}