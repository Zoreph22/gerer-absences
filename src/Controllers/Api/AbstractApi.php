<?php

namespace App\Controllers\Api;

use App\App;

abstract class AbstractApi
{
  protected $app;

  public function __constructor()
  {
    $this->app = App::$app;
    $this->init();
  }

  public abstract function init();
}
