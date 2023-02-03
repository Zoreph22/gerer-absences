<?php

namespace App\Models\ModelInstance;

class Absence
{
  private $code_absence;
  private $code_apprenant;
  private $nb_heures_absence;
  private $date_absence;

  /**
   * Get the value of code_absence
   */
  public function getCode_absence()
  {
    return $this->code_absence;
  }

  /**
   * Set the value of code_absence
   *
   * @return  self
   */
  public function setCode_absence($code_absence)
  {
    $this->code_absence = $code_absence;

    return $this;
  }

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
   * Get the value of nb_heures_absence
   */
  public function getNb_heures_absence()
  {
    return $this->nb_heures_absence;
  }

  /**
   * Set the value of nb_heures_absence
   *
   * @return  self
   */
  public function setNb_heures_absence($nb_heures_absence)
  {
    $this->nb_heures_absence = $nb_heures_absence;

    return $this;
  }

  /**
   * Get the value of date_absence
   */
  public function getDate_absence()
  {
    return $this->date_absence;
  }

  /**
   * Set the value of date_absence
   *
   * @return  self
   */
  public function setDate_absence($date_absence)
  {
    $this->date_absence = $date_absence;

    return $this;
  }
}
