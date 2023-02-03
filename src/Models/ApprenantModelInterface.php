<?php
namespace App\Models;

use App\Models\ModelInstance\Apprenant;

interface ApprenantModelInterface {
  function readApprenantByCodeApprenant(int $code);
  function readAllApprenantsByCodeGroupe(int $code);
  function readAllApprenants();
  function createApprenant(Apprenant $apprenant);
  function updateApprenant(Apprenant $apprenant);
  function deleteApprenant(Apprenant $apprenant);
}
?>