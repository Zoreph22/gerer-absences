<?php
namespace App\Views\Components\Input;

use App\Views\Components\Input\Input;
use App\Views\Components\Input\InputSize;

/**
 * Composant qui affiche un label associé a un input.
 */
class FormInput {
  public function __construct(string $text, InputType $type, InputSize $size, string $id, string $min = null)
  {
    printf("<div class='forminput-container'>");
    printf("<label class='%s-semibold subtitle' for='%s'>%s</label>",
    htmlspecialchars($size->value),
    htmlspecialchars($id),
    htmlspecialchars($text),
    );
    new Input($text, $type, $size, $id, $min);
    printf("</div>");
  }
}
?>