<?php
namespace App\Controllers\Api\DataApi;

use App\Controllers\Api\AbstractApi;
use App\Models\Factories\ModelFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class AbsencesApi extends AbstractApi {
  public function __construct() {
    parent::__constructor();
  }

  public function init() {
    $this->app->get("/api/allAbsencesOfApprenant", [$this, 'allAbsencesOfApprenant']);
    $this->app->get("/api/deleteAbsence", [$this, 'deleteAbsence']);
  }

  public function allAbsencesOfApprenant(Request $request, Response $response, $args) {
    $factory = new ModelFactory();
    $absence = $factory->createAbsence();
    $array = $request->getQueryParams();


    $data = $absence->readAllAbsencesByCodeApprenant($array["id"]);
    $payload = json_encode($data);

    $response->getBody()->write($payload);
    return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
  }

  public function deleteAbsence(Request $request, Response $response, $args) {
    $factory = new ModelFactory();
    $absence = $factory->createAbsence();
    $array = $request->getQueryParams();

    $absence->deleteAbsence($array["id"]);
    return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
  }
}
?>