<?php
namespace App\Controllers\Api\PagesApi;

use App\Controllers\Api\AbstractApi;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class RecapPageApi extends AbstractApi {
  public function __construct() {
    parent::__constructor();
  }

  public function init() {
    $this->app->get("/", [$this, 'baseUrl']);
  }

  public function baseUrl(Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
  }
}
?>