<?php
namespace App\Models\Factories;

use App\Models\Dao\GroupeModel;
use App\Models\Dao\AbsenceModel;
use App\Models\Dao\ApprenantModel;
use App\Models\Dao\RecapAbsencesModel;

/**
 * Interface d'une fabrique permettant d'instancier les DAO.
 */
interface ModelFactoryInterface {
  function createGroupe(): GroupeModel;
  function createApprenant(): ApprenantModel;
  function createAbsence(): AbsenceModel;
  function createRecapAbsences(): RecapAbsencesModel;
}
?>