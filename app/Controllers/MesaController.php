<?php

namespace Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Models\MesasModel;

class MesaController extends Controller{

    /**
     * @param array
     */
    protected $params = [
        'qtdMesas' => [],
        'unidade' => [],
        'mesasAtivas' => []
    ];

    /**
     * @param array
     */
    protected $detalhes = [
        'produtos' => []
    ];


    public function index(Request $request, Response $response){
        
        $conn = MesasModel::getInstance();

        $qtdMesas = $conn->getMesas(false);
        $unidade = $conn->getUnidades(false);
        $mesasAtivas = $conn->getMesaAtiva();

        foreach ($qtdMesas as $key => $value) {
            $this->params['qtdMesas'] =  $value['qtd_mesas'];
        }

        foreach ($unidade as $key => $value) {
            $this->params['unidade'] =  $value['descricao'];
        }

        if($mesasAtivas == 0){
            $this->params['mesasAtivas'] = $mesasAtivas;
        }else{
            foreach ($mesasAtivas as $key => $value) {
                $this->params['mesasAtivas'] = $value['mesas'];
            }
        }
        
        return $this->loadView('mesa', $response);
    }

    public function detalheMesa(Request $request, Response $response, $id){
        $conn = new MesasModel;
        $results = $conn->getDetalheMesa($id);

        foreach ($results as $result) {
            $this->detalhes['id'] = $result['id'];
            $this->detalhes['ativo'] = $result['ativo'];
            $this->detalhes['garcom'] = $result['garcom'];
            $this->detalhes['pessoas'] = $result['pessoas'];
            $this->detalhes['produtos'] = explode(',', $result['produtos']);
        }

        return $this->loadView('detalhe', $response);
        
    }

    public function mesasHome(){
        
        $conn = MesasModel::getInstance();
        
        return $result = $conn->getMesasDashboard();
    }

    public function save(Request $request, Response $response){
        $conn = MesasModel::getInstance();
        $params = $request->getParsedBody();
        $results = $conn->salvaMesaBanco($params);
        //var_dump($results);exit;
        return $response->withRedirect('/public/mesas');
        
    }
}