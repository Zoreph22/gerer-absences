<?php
namespace App\Views\Components\Input;

use App\Views\ViewComponent;
use App\Views\Components\Input\InputSize;
use App\Views\Components\Input\InputType;
use DateTime;

class Input implements ViewComponent {
  private InputType $type;
  private InputSize $size;
  private string $placeHolder;
  private string $id;
  private string $min = "";
  private string $max = "";

  public function __construct(string $placeHolder, InputType $type, InputSize $size, string $id, string $min = null) {
    $this->type = $type;
    if($this->type === InputType::Date) {
      $date = date("Y-m-d");
      $this->max = "max='$date'";
    }
    $this->size = $size;
    $this->placeHolder = $placeHolder;
    $this->id = $id;
    if($min) {
      $tempMin = htmlspecialchars($min);
      $this->min = "min='$tempMin'";
    }
    $this->render();
  }

  public function render() {
    printf("<input type='%s' class='%s' id='%s' name='%s' placeholder='%s' %s %s required/>",
    htmlspecialchars($this->type->value),
    htmlspecialchars($this->size->value),
    htmlspecialchars($this->id),
    htmlspecialchars($this->id),
    htmlspecialchars($this->placeHolder),
    $this->min,
    $this->max
  );
  }
}
