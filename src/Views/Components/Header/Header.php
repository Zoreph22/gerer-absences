<?php
namespace App\Views\Components\Header;

use App\Views\ViewComponent;
use App\Views\Components\Text\Text;
use App\Views\Components\Text\TextStyle;
use App\Views\Components\Text\TextVariant;
use App\Views\Components\Button\ButtonSize;
use App\Views\Components\Button\PrimaryButton;
use App\Views\Components\Button\SecondaryButton;

class Header implements ViewComponent {
  public function __construct()
  {
    $this->render();
  }

  public function render()
  {
    printf("<header>");
    new Text("Gérer-Absences", TextStyle::HeadingLargeBold, TextVariant::Title, "gererAbsences");
    // printf("<div class='links-button'>");
    // new SecondaryButton("Détails Groupes", ButtonSize::Medium,"detailsGroupes");
    // new PrimaryButton("Créer Apprenant", ButtonSize::Medium,"creerApprenant");
    // new PrimaryButton("Créer Groupe", ButtonSize::Medium,"creerGroupe");
    // printf("</div>");
    printf("</header>");
  }
}
?>



