<?php

namespace App\Models\Factories;

use App\Models\Dao\GroupeModel;
use App\Models\Dao\AbsenceModel;
use App\Models\Dao\ApprenantModel;
use App\Models\Dao\RecapAbsencesModel;
use App\Models\Factories\ModelFactoryInterface;

/**
 * Fabrique permettant d'instancier un DAO.
 */
class ModelFactory implements ModelFactoryInterface
{
  public function createGroupe(): GroupeModel
  {
    return new GroupeModel();
  }

  public function createApprenant(): ApprenantModel
  {
    return new ApprenantModel();
  }

  public function createAbsence(): AbsenceModel
  {
    return new AbsenceModel();
  }

  public function createRecapAbsences(): RecapAbsencesModel
  {
    return new RecapAbsencesModel();
  }
}
