<?php
namespace App\Views\Components\Button;

use App\Views\Components\Button\Button;
use App\Views\Components\Button\ButtonSize;
use App\Views\Components\Button\ButtonStyle;
use App\Views\Components\Button\ButtonVariant;

class PrimaryButton {
  public function __construct(string $text, ButtonSize $size, string $id, bool $submit = false)
  {
    new Button($text, $size, ButtonStyle::Default, ButtonVariant::Primary, $id, $submit);
  }
}
?>