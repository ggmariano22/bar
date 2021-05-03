<?php

namespace Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Models\GarcomModel;

class GarcomController extends Controller{

    /**
     * @param array
     */
    protected $garcons = [];

    public function __invoke(Request $request, Response $response){
        $conn = GarcomModel::getInstance();
        $this->garcons = $conn->getAll();
        return $this->loadView('garcom', $response);
    }
    
    public function cadastra(Request $request, Response $response){
        $params = $request->getParsedBody();
        $conn = GarcomModel::getInstance();
        $results = $conn->cadastraGarcomBanco($params);
        return $response->withRedirect('/public/garcom');

    }

    public function getGarcom(Request $request, Response $response){
        $conn = GarcomModel::getInstance();
        $params = $request->getParsedBody();
        $results = $conn->getGarcomBanco($params);
    }

}