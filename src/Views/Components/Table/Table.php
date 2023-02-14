<?php
namespace App\Views\Components\Table;

use App\Views\Components\Button\ButtonSize;
use App\Views\Components\Button\PrimaryButton;
use App\Views\Components\Button\SecondaryButton;
use App\Views\ViewComponent;

/**
 * Composant qui affiche une table.
 */
class Table implements ViewComponent {
  private $array;

  /**
   * Constructeur
   *
   * @param string[] $array Tableau qui contient le nom des colonnes.
   */
  public function __construct(array $array) {
    $this->array = $array;
    $this->render();
  }

  public function render() {

    printf("<table><thead><tr>");
    printf($this->generateTh());
    printf("</tr></thead><tbody>");
    // printf("<tr><td>ABROUDHJAMEUR Anthony</td><td>CAP BOULANGER 1</td><td><p>05h</p><div>");
    // new SecondaryButton("Détail", ButtonSize::Small,"Test");
    // new PrimaryButton("Ajouter une absence", ButtonSize::Small,"Test");
    // printf("</div></td></tr>");
    printf("</tbody></table>");
  }

  public function generateTh() {
    $output = "";
    foreach($this->array as $element) {
        $safeElement = htmlspecialchars($element);
        $output .= "<th class='medium-bold title' id='$safeElement'>$safeElement</th>";
    }
    return $output;
  }
}
?>