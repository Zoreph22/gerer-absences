<?php
namespace App\Models;

use App\Models\ModelInstance\Absence;

interface AbsenceModelInterface {
  function readAbsenceByCodeAbsence(int $code);
  function readAllAbsencesByCodeApprenant(int $code);
  function readAllAbsences();
  function createAbsence(Absence $absence);
  function updateAbsence(Absence $absence);
  function deleteAbsence(Absence $absence);
}
