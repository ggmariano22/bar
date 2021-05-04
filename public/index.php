<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\App;
use Controllers\{HomeController, MesaController, AuthController, 
                ComandaController, GarcomController, ProdutoController};

require '../vendor/autoload.php';

$app = new App;

$app->get('/', HomeController::class);
$app->get('/mesas', MesaController::class . ':index');
$app->post('/mesas', MesaController::class . ':save');
$app->get('/mesas/detalhe/{id}', MesaController::class . ':detalheMesa');

$app->get('/login', AuthController::class);
$app->post('/login', AuthController::class . ':login');
$app->get('/logout', AuthController::class . ':logout');

$app->post('/comanda/cadastro', ComandaController::class . ':cadastro');
$app->post('/comanda/finaliza', ComandaController::class . ':finaliza');

$app->get('/garcom', GarcomController::class);
$app->post('/garcom', GarcomController::class . ':cadastra');

$app->get('/produtos', ProdutoController::class);
$app->post('/produtos', ProdutoController::class . ':cadastro');
$app->get('/produtos/apagar/{id}', ProdutoController::class . ':inativa');

$app->run();