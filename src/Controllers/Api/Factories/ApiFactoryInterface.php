<?php
namespace App\Controllers\Api\Factories;

use App\Controllers\Api\DataApi\GroupeApi;
use App\Controllers\Api\DataApi\AbsencesApi;
use App\Controllers\Api\DataApi\ApprenantApi;
use App\Controllers\Api\DataApi\RecapAbsencesApi;
use App\Controllers\Api\PagesApi\RecapAbsencesPageApi;

/**
 * Interface d'une fabrique permettant d'instancier les classes d'API.
 */
interface ApiFactoryInterface {

  public function initGroupeApi(): GroupeApi;
  public function initApprenantApi(): ApprenantApi;

  public function initAbsencesApi(): AbsencesApi;
  public function initRecapAbsencesApi(): RecapAbsencesApi;

  public function initRecapAbsencesPageApi(): RecapAbsencesPageApi;
}
?>