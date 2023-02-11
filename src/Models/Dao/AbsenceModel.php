<?php

namespace App\Models\Dao;

use PDO;
use App\Models\AbsenceModelInterface;
use App\Models\Database\DbConnection;
use App\Models\ModelInstance\Absence;

class AbsenceModel implements AbsenceModelInterface
{
  /**
   * @var PDO
   */
  private $db;

  public function __construct()
  {
    $this->db = DbConnection::getDb();
  }

  public function readAbsenceByCodeAbsence(int $code)
  {
    $query = $this->db->prepare("SELECT * FROM Absence WHERE code_absence = :code");
    $query->bindValue(":code", $code, SQLITE3_INTEGER);

    $query->setFetchMode(PDO::FETCH_CLASS, "App\Models\ModelInstance\Absence");

    $query->execute();
    $absence = $query->fetch();
    return $absence;
  }

  public function readAllAbsencesByCodeApprenant(int $code)
  {
    $query = $this->db->prepare("SELECT * FROM Absence WHERE code_apprenant = :code");
    $query->bindValue(":code", $code, SQLITE3_INTEGER);

    $query->execute();
    $absences = $query->fetchAll(PDO::FETCH_CLASS, "App\Models\ModelInstance\Absence");
    return $absences;
  }

  public function readAllAbsences()
  {
    $query = $this->db->query("SELECT * FROM Absence");
    $query->execute();

    $groupes = $query->fetchAll(PDO::FETCH_CLASS, "App\Models\ModelInstance\Absence");
    return $groupes;
  }

  public function createAbsence(Absence $absence)
  {
    $query = $this->db->prepare("INSERT INTO Absence (code_apprenant, nb_heures_absence, date_absence) VALUES (:codeApprenant, :nbHeure, :dateAbs)");
    $query->bindValue(":codeApprenant", $absence->getCode_apprenant(), SQLITE3_INTEGER);
    $query->bindValue(":nbHeure", $absence->getNb_heures_absence(), SQLITE3_INTEGER);
    $query->bindValue(":dateAbs", $absence->getDate_absence(), SQLITE3_TEXT);

    $success = $query->execute();
    $absence->setCode_absence((int) $this->db->lastInsertId());
    if(!$success) {
      return false;
    }
    return $absence;
  }

  public function updateAbsence(Absence $absence)
  {
    $query = $this->db->prepare("UPDATE Absence SET nb_heures_absence = :nbHeure, date_absence = :dateAbs WHERE code_absence = :codeAbs");
    $query->bindValue(":nbHeure", $absence->getNb_heures_absence(), SQLITE3_INTEGER);
    $query->bindValue(":dateAbs", $absence->getDate_absence(), SQLITE3_TEXT);

    $query->bindValue(":codeAbs", $absence->getCode_absence(), SQLITE3_INTEGER);

    $success = $query->execute();
    return $success;
  }

  public function deleteAbsence(int $code)
  {
    $query = $this->db->prepare("DELETE FROM Absence WHERE code_absence = :codeAbs");
    $query->bindValue(":codeAbs", $code, SQLITE3_INTEGER);

    $success = $query->execute();
    return $success;
  }
}
