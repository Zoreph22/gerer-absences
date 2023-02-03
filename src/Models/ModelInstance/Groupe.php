<?php
namespace App\Models\ModelInstance;

class Groupe
{
  private $code_groupe;
  private $nom_groupe;

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
   * Get the value of nom_groupe
   */
  public function getNom_groupe()
  {
    return $this->nom_groupe;
  }

  /**
   * Set the value of nom_groupe
   *
   * @return  self
   */
  public function setNom_groupe($nom_groupe)
  {
    $this->nom_groupe = $nom_groupe;

    return $this;
  }
}
