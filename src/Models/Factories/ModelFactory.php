<?php

namespace App\Models\Factories;

use App\Models\Dao\GroupeModel;
use App\Models\Dao\AbsenceModel;
use App\Models\Dao\ApprenantModel;
use App\Models\Dao\RecapAbsencesModel;
use App\Models\Factories\ModelFactoryInterface;

class ModelFactory implements ModelFactoryInterface
{
  public function createGroupe()
  {
    return new GroupeModel();
  }

  public function createApprenant()
  {
    return new ApprenantModel();
  }

  public function createAbsence()
  {
    return new AbsenceModel();
  }

  public function createRecapAbsences()
  {
    return new RecapAbsencesModel();
  }
}
