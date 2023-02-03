<?php
namespace App;

use App\Models\Factories\ModelFactory;


class Test {
  /**
   * @var ModelFactory
   */
  protected static $factory;

  public static function init(){
    self::$factory = new ModelFactory();
  }

  public static function groupeTest() {
    $groupe = self::$factory->createGroupe();
    echo '<pre>';
    var_dump($groupe->readGroupeByCodeGroupe(1));
    var_dump($groupe->readAllGroupes());
    echo '</pre>';
  }

  public static function ApprenantTest() {
    $apprenant = self::$factory->createApprenant();
    echo '<pre>';
    var_dump($apprenant->readApprenantByCodeApprenant(1));
    var_dump($apprenant->readAllApprenantsByCodeGroupe(1));
    var_dump($apprenant->readAllApprenants());
    echo '</pre>';
  }

  public static function AbsenceTest() {
    $absence = self::$factory->createAbsence();
    echo '<pre>';
    var_dump($absence->readAbsenceByCodeAbsence(1));
    var_dump($absence->readAllAbsencesByCodeApprenant(1));
    var_dump($absence->readAllAbsences());
    echo '</pre>';
  }

  public static function RecapAbsencesTest() {
    $recapAbsence = self::$factory->createRecapAbsences();
    echo '<pre>';
    var_dump($recapAbsence->readRecapAbsences());
    echo '</pre>';
  }
}
?>