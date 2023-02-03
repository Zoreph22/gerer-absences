<?php
namespace App;

use Slim\Factory\AppFactory;

class App {
  /**
   * @var Slim\App
   */
  public static $app;

  public static function init() {
    self::$app = AppFactory::create();
  }
}
?>