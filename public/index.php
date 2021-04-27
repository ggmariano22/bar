<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\App;
use Controllers\HomeController;
use Controllers\MesaController;

require '../vendor/autoload.php';

$app = new App;

$app->get('/', HomeController::class);
$app->get('/mesas', MesaController::class . ':index');
$app->get('/mesas/detalhe/{id}', MesaController::class . ':detalheMesa');

$app->run();