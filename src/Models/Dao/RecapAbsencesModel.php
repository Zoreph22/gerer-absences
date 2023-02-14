<?php

namespace App\Models\Dao;

use PDO;
use App\Models\Database\DbConnection;
use App\Models\ModelInstance\RecapAbsences;
use App\Models\RecapAbsencesModelInterface;

/**
 * Classe qui permet de récupérer toutes les informations nécessaires, a l'affichage des données dans la page récapitulatif.
 */
class RecapAbsencesModel implements RecapAbsencesModelInterface
{
  private PDO $db;

  public function __construct()
  {
    $this->db = DbConnection::getDb();
  }

  public function readRecapAbsences(): array
  {
    $query = $this->db->query("SELECT Apprenant.code_apprenant, code_groupe, nom_apprenant, prenom_apprenant, nom_groupe, SUM(nb_heures_absence) AS nb_total_h_absences
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
