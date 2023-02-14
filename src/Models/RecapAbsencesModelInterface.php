<?php
namespace App\Models;

interface RecapAbsencesModelInterface {
  /**
   * Permet de récupérer l'ensemble de toutes les données de la base pour l'affichage de la page de récapitulatif des absences.
   *
   * @return RecapAbsences[] Retourne un tableau d'instance RecapAbsences.
   */
  function readRecapAbsences(): array;
}
?>