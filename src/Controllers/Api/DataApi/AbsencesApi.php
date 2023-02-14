<?php
namespace App\Controllers\Api\DataApi;

use App\Controllers\Api\AbstractApi;
use App\Models\Factories\ModelFactory;
use App\Models\ModelInstance\Absence;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Classe de routes API pour la base de données absences.
 */
class AbsencesApi extends AbstractApi {
  public function __construct() {
    parent::__constructor();
  }

  public function init() {
    $this->app->get("/api/allAbsencesOfApprenant", [$this, 'allAbsencesOfApprenant']);
    $this->app->delete("/api/deleteAbsence", [$this, 'deleteAbsence']);
    $this->app->put("/api/updateAbsence", [$this, 'updateAbsence']);
    $this->app->post("/api/createAbsence", [$this, 'createAbsence']);
  }

  public function allAbsencesOfApprenant(Request $request, Response $response, $args): Response {
    $factory = new ModelFactory();
    $absenceFactory = $factory->createAbsence();
    $array = $request->getQueryParams();


    $data = $absenceFactory->readAllAbsencesByCodeApprenant($array["id"]);
    $payload = json_encode($data);

    $response->getBody()->write($payload);
    return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
  }

  public function createAbsence(Request $request, Response $response, $args): Response {
    $factory = new ModelFactory();
    $absenceFactory = $factory->createAbsence();
    $contents = $request->getBody()->getContents();
    $data = json_decode($contents);

    $absence = new Absence();
    $absence->setCode_apprenant($data->code_apprenant);
    $absence->setNb_heures_absence($data->nb_heures_absence);
    $absence->setDate_absence($data->date_absence);

    $newAbsence = $absenceFactory->createAbsence($absence);
    $payload = json_encode($newAbsence);
    $response->getBody()->write($payload);

    return $response
    ->withHeader('Content-Type', 'application/json')
    ->withStatus(200);
  }

  public function updateAbsence(Request $request, Response $response, $args): Response {
    $factory = new ModelFactory();
    $absenceFactory = $factory->createAbsence();
    $array = $request->getQueryParams();
    $contents = $request->getBody()->getContents();
    $data = json_decode($contents);

    $absence = $absenceFactory->readAbsenceByCodeAbsence($array["id"]);
    $absence->setNb_heures_absence($data->nb_heures_absence);
    $absence->setDate_absence($data->date_absence);

    $absenceFactory->updateAbsence($absence);

    return $response
    ->withHeader('Content-Type', 'application/json')
    ->withStatus(200);
  }

  public function deleteAbsence(Request $request, Response $response, $args): Response {
    $factory = new ModelFactory();
    $absenceFactory = $factory->createAbsence();
    $array = $request->getQueryParams();

    $absenceFactory->deleteAbsence($array["id"]);
    return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
  }

}
?>