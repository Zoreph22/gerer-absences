<?php
namespace App;

use Slim\Factory\AppFactory;

/**
 * Classe qui permet d'initialiser le Slim Framework.
 */
class App {
  /**
   * @var Slim\App
   */
  public static $app;

  /**
   * Fonction qui instancie le Slim Framework.
   *
   * @return void
   */
  public static function init() {
    self::$app = AppFactory::create();
    self::$app->addErrorMiddleware(true, true, true);
  }
}
?>