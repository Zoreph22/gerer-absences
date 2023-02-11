<?php
namespace App\Views\Components\Input;

use App\Views\ViewComponent;
use App\Views\Components\Input\InputSize;

class Input implements ViewComponent {
  private InputSize $size;
  private string $placeHolder;
  private string $id;

  public function __construct(string $placeHolder, InputSize $size, string $id) {
    $this->size = $size;
    $this->placeHolder = $placeHolder;
    $this->id = $id;
    $this->render();
  }

  public function render() {
    echo "<input type='text' class='{$this->size->value}' id='$this->id' name='$this->id' placeholder='{$this->placeHolder}' required/>";
  }
}
?>