<?php
namespace App\Controllers\Api\Factories;

interface ApiFactoryInterface {
  public function initGroupeApi();
  public function initApprenantApi();
  public function initAbsencesApi();

  public function initRecapPageApi();
}
?>