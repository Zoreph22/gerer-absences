<?php
namespace App\Controllers\Api\Factories;

use App\Controllers\Api\DataApi\GroupeApi;
use App\Controllers\Api\DataApi\AbsencesApi;
use App\Controllers\Api\DataApi\ApprenantApi;
use App\Controllers\Api\DataApi\RecapAbsencesApi;
use App\Controllers\Api\Factories\ApiFactoryInterface;
use App\Controllers\Api\PagesApi\RecapAbsencesPageApi;

class ApiFactory implements ApiFactoryInterface {
  public function __construct() {
    $this->initGroupeApi();
    $this->initApprenantApi();
    $this->initAbsencesApi();
    $this->initRecapAbsencesApi();
    $this->initRecapAbsencesPageApi();
  }

  public function initGroupeApi() {
    return new GroupeApi();
  }

  public function initApprenantApi() {
    return new ApprenantApi();
  }

  public function initAbsencesApi() {
    return new AbsencesApi();
  }

  public function initRecapAbsencesApi() {
    return new RecapAbsencesApi();
  }

  public function initRecapAbsencesPageApi() {
    return new RecapAbsencesPageApi();
  }
  }
