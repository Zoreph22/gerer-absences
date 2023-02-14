<?php
namespace App\Views\Components\Main;

use App\Views\ViewComponent;
use App\Views\Components\Text\Text;
use App\Views\Components\Table\Table;
use App\Views\Components\Text\TextStyle;
use App\Views\Components\Text\TextVariant;

/**
 * Composant qui affiche le contenu <main> de la page.
 */
class Main implements ViewComponent {
  public function __construct()
  {
    $this->render();
  }

  public function render()
  {
    printf("<main><div class='recapAbsencesContainer'>");
    new Text("Récapitulatif des absences", TextStyle::Xl2Bold, TextVariant::Title, "recapAbsences");
    new Table(array("Apprenants", "Groupe", "Nombres d'heures d'absences"));
    printf("</div></main>");
  }
}
?>

