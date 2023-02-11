<?php
namespace App\Views\Components\Input;

use App\Views\Components\Select\SelectSize;

class FormSelect {
  public function __construct(string $text, SelectSize $size, string $id)
  {
    echo "<div class='forminput-container'>";
    echo "<label class='$size->value-semibold subtitle' for='$id'>$text</label>";
    new Select($text, $size, $id);
    echo "</div>";
  }
}
?>