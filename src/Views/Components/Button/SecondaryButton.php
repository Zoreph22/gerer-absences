<?php
namespace App\Views\Components\Button;

use App\Views\Components\Button\Button;
use App\Views\Components\Button\ButtonSize;
use App\Views\Components\Button\ButtonStyle;
use App\Views\Components\Button\ButtonVariant;

class SecondaryButton {
  public function __construct(string $text, ButtonSize $size, string $id)
  {
    new Button($text, $size, ButtonStyle::Outline, ButtonVariant::Secondary, $id);
  }
}
?>