<?php

namespace api\controllers;

use edustef\mvcFrame\Controller;
use edustef\mvcFrame\Request;
use edustef\mvcFrame\Response;
use api\models\Cliente;

class SiteController extends Controller
{

  public function getClientes(Request $request, Response $response)
  {
    return $response->json(Cliente::findAll());
  }

  public function postCliente(Request $request, Response $response)
  {
    $cliente = new Cliente();
    $cliente->loadData($request->getBody());

    if ($cliente->validate() && $cliente->save()) {
      return $response->json($cliente);
    }
  }

  public function deleteCliente(Request $request, Response $response)
  {
    return $response->json(['delete' => 'hello']);
  }
}
