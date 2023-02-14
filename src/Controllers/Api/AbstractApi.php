<?php

namespace App\Controllers\Api;

use App\App;

/**
 * Classe mère d'une classe gérant les routes API.
 */
abstract class AbstractApi
{
  /**
   * @var Slim\App
   */
  protected $app;

  public function __constructor()
  {
    $this->app = App::$app;
    $this->init();
  }

  /**
   * Permet d'initialiser les routes.
   *
   * @return void
   */
  public abstract function init();
}
