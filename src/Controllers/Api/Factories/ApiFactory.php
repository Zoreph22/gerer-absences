<?php
namespace App\Controllers\Api\Factories;

use App\Controllers\Api\DataApi\GroupeApi;
use App\Controllers\Api\DataApi\AbsencesApi;
use App\Controllers\Api\DataApi\ApprenantApi;
use App\Controllers\Api\DataApi\RecapAbsencesApi;
use App\Controllers\Api\Factories\ApiFactoryInterface;
use App\Controllers\Api\PagesApi\RecapAbsencesPageApi;

/**
 * Fabrique permettant d'instancier les classes d'API.
 */
class ApiFactory implements ApiFactoryInterface {
  public function __construct() {
    $this->initGroupeApi();
    $this->initApprenantApi();
    $this->initAbsencesApi();
    $this->initRecapAbsencesApi();
    $this->initRecapAbsencesPageApi();
  }

  public function initGroupeApi(): GroupeApi {
    return new GroupeApi();
  }

  public function initApprenantApi(): ApprenantApi{
    return new ApprenantApi();
  }

  public function initAbsencesApi(): AbsencesApi {
    return new AbsencesApi();
  }

  public function initRecapAbsencesApi(): RecapAbsencesApi {
    return new RecapAbsencesApi();
  }

  public function initRecapAbsencesPageApi(): RecapAbsencesPageApi {
    return new RecapAbsencesPageApi();
  }
  }
