<?php
namespace App\Views\Components\Input;

use App\Views\Components\Input\Input;
use App\Views\Components\Input\InputSize;

class FormInput {
  public function __construct(string $text, InputSize $size, string $id)
  {
    echo "<div class='forminput-container'>";
    echo "<label class='$size->value-semibold subtitle' for='$id'>$text</label>";
    new Input($text, $size, $id);
    echo "</div>";
  }
}
?>