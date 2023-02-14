<?php

namespace App\Views\Components\Text;

use App\Views\ViewComponent;

/**
 * Composant qui affiche un text.
 */
class Text implements ViewComponent
{
  private string $text;
  private TextStyle $style;
  private TextVariant $variant;
  private string $id;

  public function __construct(string $text, TextStyle $style, TextVariant $variant, string $id)
  {
    $this->style = $style;
    $this->variant = $variant;
    $this->text = $text;
    $this->id = $id;
    $this->render();
  }

  public function render()
  {
    printf(
      "<p class='%s %s' id='%s'>%s</p>",
      htmlspecialchars($this->style->value),
      htmlspecialchars($this->variant->value),
      htmlspecialchars($this->id),
      htmlspecialchars($this->text)
    );
  }
}
