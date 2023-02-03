<?php
namespace App\Models\Database;

use PDO;
use App\Config;


class DbConnection {
  private static $db;
  private static $uri = Config::DB_URI;

  public static function connect() {
    self::$db = new PDO("sqlite:" . self::$uri);
    self::$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  /**
   * Get the value of db
   */
  public static function getDb()
  {
    return self::$db;
  }
}
