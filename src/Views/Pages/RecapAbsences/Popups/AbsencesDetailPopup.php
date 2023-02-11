<?php
namespace App\Views\Pages\RecapAbsences\Popups;

use App\Views\ViewComponent;
use App\Views\Components\Text\Text;
use App\Views\Components\Text\TextStyle;
use App\Views\Components\Text\TextVariant;
use App\Views\Components\Button\ButtonSize;
use App\Views\Components\Button\PrimaryButton;
use App\Views\Components\Button\SecondaryButton;

class AbsencesDetailPopup implements ViewComponent {
  public function __construct()
  {
    $this->render();
  }

  public function render()
  {
    printf("<div class='hidden popup' id='detailAbsences' data-id=''>");
    new Text("ALBERT Jérémy", TextStyle::Xl2Bold, TextVariant::Title, "absenceName");

    printf("<div class='absences-container' id='absencesContainer'></div>");
    printf("<hr>");

    printf("<div class='bottomButton'>");
    // new SecondaryButton("Modifier Apprenant", ButtonSize::Medium, "modifierApprenant");
    new PrimaryButton("Fermer", ButtonSize::Medium, "fermerAbsences");
    printf("</div></div>");
  }
}
?>