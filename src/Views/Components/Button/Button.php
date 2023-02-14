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
  private string $submit = "type='button'";

  public function __construct(string $text, ButtonSize $size, ButtonStyle $style, ButtonVariant $variant, string $id, bool $submit = false)
  {
    $this->size = $size;
    $this->style = $style;
    $this->variant = $variant;
    $this->text = $text;
    $this->id = $id;
    if($submit) {
      $this->submit = "type='submit'";
    }
    $this->render();
  }

  public function render()
  {
    printf(
      "<button %s class='%s %s %s' id='%s'>%s</button>",
      $this->submit,
      htmlspecialchars($this->size->value),
      htmlspecialchars($this->style->value),
      htmlspecialchars($this->variant->value),
      htmlspecialchars($this->id),
      htmlspecialchars($this->text)
    );
  }
}
