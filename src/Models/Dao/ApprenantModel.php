<?php
namespace App\Models\Dao;

use PDO;
use App\Models\Database\DbConnection;
use App\Models\ApprenantModelInterface;
use App\Models\ModelInstance\Apprenant;

class ApprenantModel implements ApprenantModelInterface {
  /**
   * @var PDO
   */
  private $db;

  public function __construct() {

    $this->db = DbConnection::getDb();
  }

  public function readApprenantByCodeApprenant(int $code) {
    $query = $this->db->prepare("SELECT * FROM Apprenant WHERE code_apprenant = :code");
    $query->bindValue(":code", $code, SQLITE3_INTEGER);

    $query->setFetchMode(PDO::FETCH_CLASS, "App\Models\ModelInstance\Apprenant");

    $query->execute();
    $apprenant = $query->fetch();
    return $apprenant;
  }

  public function readAllApprenantsByCodeGroupe(int $code) {
    $query = $this->db->prepare("SELECT * FROM Apprenant WHERE code_groupe = :code");
    $query->bindValue(":code", $code, SQLITE3_INTEGER);

    $query->execute();
    $apprenants = $query->fetchAll(PDO::FETCH_CLASS, "App\Models\ModelInstance\Apprenant");
    return $apprenants;
  }

  public function readAllApprenants() {
    $query = $this->db->query("SELECT * FROM Apprenant");
    $query->execute();

    $groupes = $query->fetchAll(PDO::FETCH_CLASS, "App\Models\ModelInstance\Apprenant");
    return $groupes;
  }

  public function createApprenant(Apprenant $apprenant) {

  }

  public function updateApprenant(Apprenant $apprenant) {

  }

  public function deleteApprenant(Apprenant $apprenant) {

  }

}
