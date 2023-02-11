<?php
namespace App\Models\Dao;

use PDO;
use App\Models\GroupeModelInterface;
use App\Models\ModelInstance\Groupe;
use App\Models\Database\DbConnection;

class GroupeModel implements GroupeModelInterface {
  /**
   * @var PDO
   */
  private $db;

  public function __construct() {

    $this->db = DbConnection::getDb();
  }

  public function readGroupeByCodeGroupe(int $code) {
    $query = $this->db->prepare("SELECT * FROM Groupe WHERE code_groupe = :code");
    $query->bindValue(":code", $code, SQLITE3_INTEGER);

    $query->setFetchMode(PDO::FETCH_CLASS, "App\Models\ModelInstance\Groupe");

    $query->execute();
    $groupe = $query->fetch();
    return $groupe;
  }

  public function readAllGroupes() {
    $query = $this->db->query("SELECT * FROM Groupe");
    $query->execute();

    $groupes = $query->fetchAll(PDO::FETCH_CLASS, "App\Models\ModelInstance\Groupe");
    return $groupes;
  }

  //TODO Rajouter la récupération de l'id du groupe
  public function createGroupe(Groupe $groupe) {
    $query = $this->db->prepare("INSERT INTO Groupe (code_groupe, nom_groupe) VALUES (:code, :nom)");
    $query->bindValue(":code", $groupe->getCode_groupe(), SQLITE3_INTEGER);
    $query->bindValue(":nom", $groupe->getNom_groupe(), SQLITE3_TEXT);

    $success = $query->execute();
    return $success;
  }

  public function updateGroupe(Groupe $groupe) {

  }

  public function deleteGroupe(Groupe $groupe) {

  }

}
