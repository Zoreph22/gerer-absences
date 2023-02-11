<?php
namespace App\Controllers\Api\PagesApi;

use App\Test;
use App\Views\Pages\Page;
use App\Controllers\Api\AbstractApi;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;

class RecapAbsencesPageApi extends AbstractApi {
  public function __construct() {
    parent::__constructor();
  }

  public function init() {
    $this->app->get("/", [$this, 'recapAbsences']);
    // $this->app->get("/testDb", [$this, 'testDb']);
  }

  public function recapAbsences(Request $request, Response $response, $args) {
    $renderer = new PhpRenderer("src/Views/Pages");
    return $renderer->render($response, "RecapAbsences/RecapAbsencesPage.php");
  }

  public function testDb(Request $request, Response $response, $args) {
    Test::init();
    // Test::groupeTest();
    // Test::ApprenantTest();
    Test::AbsenceTest();
    // Test::RecapAbsencesTest();

    return $response;
  }
}
?>