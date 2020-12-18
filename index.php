<?php
ini_set('display_errors', 'on');

require_once __DIR__ . '/vendor/autoload.php';

use api\controllers\SiteController;
use edustef\mvcFrame\Application;
use edustef\mvcFrame\exceptions\ForbiddenException;

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
  'db' => [
    'dsn' => $_ENV['DB_DSN'],
    'user' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASSWORD']
  ],
];

$app = new Application($config);

$app->router->get('/', function ($request, $response) {
  throw new ForbiddenException();
});
$app->router->get('/clientes', [SiteController::class, 'getClientes']);
$app->router->post('/clientes', [SiteController::class, 'postCliente']);
$app->router->delete('/clientes', [SiteController::class, 'deleteCliente']);

$app->run();
