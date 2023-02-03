<?php
namespace App\Models;

use App\Models\ModelInstance\Groupe;

interface GroupeModelInterface {
  function readGroupeByCodeGroupe(int $code);
  function readAllGroupes();
  function createGroupe(Groupe $groupe);
  function updateGroupe(Groupe $groupe);
  function deleteGroupe(Groupe $groupe);
}
?>