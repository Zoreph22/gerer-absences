<?php
namespace App\Views\Pages\RecapAbsences\Popups;

use App\Views\ViewComponent;
use App\Views\Components\Text\Text;
use App\Views\Components\Text\TextStyle;
use App\Views\Components\Input\FormInput;
use App\Views\Components\Input\InputSize;
use App\Views\Components\Input\InputType;
use App\Views\Components\Text\TextVariant;
use App\Views\Components\Button\ButtonSize;
use App\Views\Components\Button\BasicButton;
use App\Views\Components\Button\DeleteButton;
use App\Views\Components\Button\PrimaryButton;

class AbsenceEditPopup implements ViewComponent {
  public function __construct()
  {
    $this->render();
  }

  public function render()
  {
    printf("<div class='editHidden editPopup' id='editAbsences' data-id=''>");
    new Text("Créer Absence", TextStyle::Xl2Bold, TextVariant::Title, "editTitle");

    printf("<form id='form-EditPopup'>");

    printf("<div class='formContainer'>");
    new FormInput("Date", InputType::Date, InputSize::Large, "date");
    new FormInput("Nombre d'heures d'absences", InputType::Number, InputSize::Large, "nbHeuresAbsences", "1");

    printf("<div class='nameContainer'>");
    new Text("Apprenant :", TextStyle::LargeSemiBold, TextVariant::SubTitle, "random");
    new Text("Name", TextStyle::LargeRegular, TextVariant::Paragraphe, "apprenantName");
    printf("</div></div>");

    printf("<did class='action'><div class='formAction'>");
    new BasicButton("Annuler", ButtonSize::Large, "annuler");
    new PrimaryButton("Créer", ButtonSize::Large, "confirm", true);
    printf("</div>");


    printf("<div class='bottomSection bsHidden' id='bottomSection'><hr>");

    printf("<div class='deleteSection'>");
    new Text("Supprimer l'absence", TextStyle::LargeSemiBold, TextVariant::Title, "supprimerAbsence");
    new DeleteButton("Supprimer", ButtonSize::Medium, "supprimer");
    printf("</div></div>");

    printf("</form></div>");
  }
}
?>