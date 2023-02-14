<?php

namespace App\Models\Database;

use PDO;
use App\Config;

/**
 * Classe qui permettant de gérer la connection à la base de données Sqlite.
 */
class DbConnection
{
  private static PDO $db;
  private static string $uri = Config::DB_URI;

  /**
   * Permet de se connecter à la base de données Sqlite.
   *
   * @return void
   */
  public static function connect()
  {
    self::$db = new PDO("sqlite:" . self::$uri);
    self::$db->exec("PRAGMA foreign_keys = ON;");
    self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public static function getDb(): PDO
  {
    return self::$db;
  }
}
