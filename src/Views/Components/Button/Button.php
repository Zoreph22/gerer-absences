<?php

namespace App\Views\Components\Button;

use App\Views\ViewComponent;
use App\Views\Components\Button\ButtonSize;
use App\Views\Components\Button\ButtonStyle;
use App\Views\Components\Button\ButtonVariant;

class Button implements ViewComponent
{
  private ButtonSize $size;
  private ButtonStyle $style;
  private ButtonVariant $variant;
  private string $text;
  private string $id;

  public function __construct(string $text, ButtonSize $size, ButtonStyle $style, ButtonVariant $variant, string $id)
  {
    $this->size = $size;
    $this->style = $style;
    $this->variant = $variant;
    $this->text = $text;
    $this->id = $id;
    $this->render();
  }

  public function render()
  {
    printf(
      "<button class='%s %s %s' id='%s'>%s</button>",
      htmlspecialchars($this->size->value),
      htmlspecialchars($this->style->value),
      htmlspecialchars($this->variant->value),
      htmlspecialchars($this->id),
      htmlspecialchars($this->text)
    );
  }
}
