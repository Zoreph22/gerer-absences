<?php
namespace App\Controllers\Api\DataApi;

use App\Controllers\Api\AbstractApi;
use App\Models\Factories\ModelFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Classe de routes API pour le récapitulatif des absences.
 */
class RecapAbsencesApi extends AbstractApi {
  public function __construct() {
    parent::__constructor();
  }

  public function init() {
    $this->app->get("/api/recapAbsences", [$this, 'recapAbsences']);
  }

  public function recapAbsences(Request $request, Response $response, array $args): Response {
    $factory = new ModelFactory();
    $recapAbsence = $factory->createRecapAbsences();

    $data = $recapAbsence->readRecapAbsences();
    $payload = json_encode($data);

    $response->getBody()->write($payload);
    return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
  }
}
