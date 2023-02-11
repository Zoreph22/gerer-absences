<?php
namespace App\Models\Dao;

use PDO;
use App\Models\Database\DbConnection;
use App\Models\RecapAbsencesModelInterface;

class RecapAbsencesModel implements RecapAbsencesModelInterface {
  /**
   * @var PDO
   */
  private $db;

  public function __construct() {
    $this->db = DbConnection::getDb();
  }

  public function readRecapAbsences() {
    $query = $this->db->query("SELECT Apprenant.code_apprenant, code_groupe, nom_apprenant, prenom_apprenant, nom_groupe, SUM(nb_heures_absence) AS nb_total_absences
    FROM Apprenant
    NATURAL JOIN Groupe
    LEFT JOIN Absence ON Absence.code_apprenant = Apprenant.code_apprenant
    GROUP BY Apprenant.code_apprenant
    ORDER BY nom_apprenant asc;");

    $query->execute();
    $recapAbsences = $query->fetchAll(PDO::FETCH_CLASS, "App\Models\ModelInstance\RecapAbsences");
    return $recapAbsences;
  }
}
