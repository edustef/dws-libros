<?php

namespace api\controllers;

use edustef\mvcFrame\Controller;
use edustef\mvcFrame\Request;
use edustef\mvcFrame\Response;
use api\models\Libro;
use edustef\mvcFrame\exceptions\NotFoundException;

class LibroController extends Controller
{

  public function getLibros(Request $request, Response $response)
  {
    return $response->json(Libro::findAll());
  }

  public function postLibro(Request $request, Response $response)
  {
    $libro = new Libro();
    $libro->loadData($request->getBody());

    if ($libro->validate() && $libro->save()) {
      $response->setStatusCode(201);
      return $response->json(['status' => 'ok', 'message' => 'Created successfully']);
    }

    return $response->json([
      'errors' => $libro->errors
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
