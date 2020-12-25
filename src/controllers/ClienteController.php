<?php

namespace api\controllers;

use edustef\mvcFrame\Controller;
use edustef\mvcFrame\Request;
use edustef\mvcFrame\Response;
use api\models\Cliente;
use edustef\mvcFrame\exceptions\NotFoundException;

class ClienteController extends Controller
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
      $response->setStatusCode(201);
      return $response->json(['status' => 'ok', 'message' => 'Created successfully']);
    }

    $response->setStatusCode(400);
    return $response->json([
      'errors' => $cliente->errors
    ]);
  }

  public function deleteCliente(Request $request, Response $response)
  {
    $where = ['dni' => $request->getBody()['dni']];
    if (Cliente::delete($where)) {
      $response->setStatusCode(204);
      return $response->json(['status' => 'ok', 'Deleted successfully']);
    }

    throw new NotFoundException('No cliente found with that DNI');
  }

  public function editCliente(Request $request, Response $response)
  {
    $body = $request->getBody();
    if (Cliente::update($body)) {
      $response->setStatusCode(204);
      return $response->json(['status' => 'ok', 'message' => 'Updated successfully']);
    }

    throw new NotFoundException('No cliente found with that DNI');
  }
}
