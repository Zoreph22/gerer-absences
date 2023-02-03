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
  }

  public function updateAbsence(Absence $absence)
  {
  }

  public function deleteAbsence(Absence $absence)
  {
  }
}
