<?php
namespace App\Models\ModelInstance;

class Apprenant {
  private $code_apprenant;
  private $code_groupe;
  private $nom_apprenant;
  private $prenom_apprenant;

  /**
   * Get the value of code_apprenant
   */
  public function getCode_apprenant()
  {
    return $this->code_apprenant;
  }

  /**
   * Set the value of code_apprenant
   *
   * @return  self
   */
  public function setCode_apprenant($code_apprenant)
  {
    $this->code_apprenant = $code_apprenant;

    return $this;
  }

  /**
   * Get the value of code_groupe
   */
  public function getCode_groupe()
  {
    return $this->code_groupe;
  }

  /**
   * Set the value of code_groupe
   *
   * @return  self
   */
  public function setCode_groupe($code_groupe)
  {
    $this->code_groupe = $code_groupe;

    return $this;
  }

  /**
   * Get the value of nom_apprenant
   */
  public function getNom_apprenant()
  {
    return $this->nom_apprenant;
  }

  /**
   * Set the value of nom_apprenant
   *
   * @return  self
   */
  public function setNom_apprenant($nom_apprenant)
  {
    $this->nom_apprenant = $nom_apprenant;

    return $this;
  }

  /**
   * Get the value of prenom_apprenant
   */
  public function getPrenom_apprenant()
  {
    return $this->prenom_apprenant;
  }

  /**
   * Set the value of prenom_apprenant
   *
   * @return  self
   */
  public function setPrenom_apprenant($prenom_apprenant)
  {
    $this->prenom_apprenant = $prenom_apprenant;

    return $this;
  }
}
?>