<?php
namespace App\Views;

/**
 * Interface qui sert de base pour les classes de composants.
 */
interface ViewComponent {
  /**
   * Affiche l'html contenu dans la fonction.
   *
   * @return void
   */
  public function render();
}
?>