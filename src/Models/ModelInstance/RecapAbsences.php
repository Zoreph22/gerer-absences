<?php
namespace App\Models\ModelInstance;

use JsonSerializable;

/**
 * Classe qui représente le récapitulatif des absences d'un apprenant.
 */
class RecapAbsences implements JsonSerializable {
  private int $code_apprenant;
  private int $code_groupe;
  private string $nom_groupe;
  private string $nom_apprenant;
  private string $prenom_apprenant;
  private int | null $nb_total_h_absences;

  public function jsonSerialize(): mixed
  {
    $vars = get_object_vars($this);
    return $vars;
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

  public function getCode_groupe()
  {
    return $this->code_groupe;
  }

  public function setCode_groupe(int $code_groupe)
  {
    $this->code_groupe = $code_groupe;

    return $this;
  }

  public function getNom_groupe()
  {
    return $this->nom_groupe;
  }

  public function setNom_groupe(string $nom_groupe)
  {
    $this->nom_groupe = $nom_groupe;

    return $this;
  }

  public function getNom_apprenant()
  {
    return $this->nom_apprenant;
  }

  public function setNom_apprenant(string $nom_apprenant)
  {
    $this->nom_apprenant = $nom_apprenant;

    return $this;
  }

  public function getPrenom_apprenant()
  {
    return $this->prenom_apprenant;
  }

  public function setPrenom_apprenant(string $prenom_apprenant)
  {
    $this->prenom_apprenant = $prenom_apprenant;

    return $this;
  }

  public function getnb_total_h_absences()
  {
    return $this->nb_total_h_absences;
  }

  public function setnb_total_h_absences(int $nb_total_h_absences)
  {
    $this->nb_total_h_absences = $nb_total_h_absences;

    return $this;
  }
}
