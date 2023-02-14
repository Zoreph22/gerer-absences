<?php
namespace App\Models;

use App\Models\ModelInstance\Absence;

interface AbsenceModelInterface {
  /**
   * Permet de récupérer une instance d'une absence à partir de son code.
   *
   * @param integer $code Code de l'absence
   * @return Absence Retourne une instance d'absence
   */
  function readAbsenceByCodeAbsence(int $code): Absence;

  /**
   * Permet de récupérer l'ensemble de toutes les absences d'un apprenant.
   *
   * @param integer $code Code de l'apprenant
   * @return Absence[] Retourne un tableau d'instance d'absence.
   */
  function readAllAbsencesByCodeApprenant(int $code): array;

  /**
   * Permet de récupérer l'ensemble de toutes les absences contenu dans la base de données.
   *
   * @return Absence[] Retourne un tableau d'instance d'absence.
   */
  function readAllAbsences(): array;

  /**
   * Permet d'ajouter une absence dans la base de données.
   *
   * @param Absence $absence
   * @return Absence Retourne l'instance de l'absence avec son code absence.
   */
  function createAbsence(Absence $absence): Absence;

  /**
   * Mettre à jour une absence dans la base de données.
   *
   * @param Absence $absence
   * @return bool Met true si la requête a été exécuter avec succès.
   */
  function updateAbsence(Absence $absence): bool;
  
  /**
   * Supprimer une absence dans la base de données.
   *
   * @param integer $code Code de l'absence.
   * @return bool Met true si la requête a été exécuter avec succès.
   */
  function deleteAbsence(int $code): bool;
}
