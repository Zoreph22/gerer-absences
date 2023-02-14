<?php

namespace App\Models\ModelInstance;

use DateTime;
use Exception;
use JsonSerializable;

/**
 * Classe qui représente la table absence de la base de données.
 */
class Absence implements JsonSerializable
{
  private int $code_absence;
  private int $code_apprenant;
  private int $nb_heures_absence;
  private string $date_absence;

  public function jsonSerialize(): mixed
  {
    $vars = get_object_vars($this);
    return $vars;
  }

  public function getCode_absence()
  {
    return $this->code_absence;
  }

  public function setCode_absence(int $code_absence)
  {
    $this->code_absence = $code_absence;

    return $this;
  }

  public function getCode_apprenant()
  {
    return $this->code_apprenant;
  }

  public function setCode_apprenant(int $code_apprenant)
  {
    $this->code_apprenant = $code_apprenant;

    return $this;
  }

  public function getNb_heures_absence()
  {
    return $this->nb_heures_absence;
  }

  public function setNb_heures_absence(int $nb_heures_absence)
  {
    if(!is_int($nb_heures_absence) || $nb_heures_absence < 1){
      throw new Exception("Le nombre doit être plus grand que 0");
    }
    $this->nb_heures_absence = $nb_heures_absence;

    return $this;
  }

  public function getDate_absence()
  {
    return $this->date_absence;
  }

  public function setDate_absence(string $date_absence)
  {
    if (!DateTime::createFromFormat('Y-m-d', $date_absence)) {
      throw new Exception("Format Date Invalide");
    }

    $this->date_absence = $date_absence;

    return $this;
  }
}
