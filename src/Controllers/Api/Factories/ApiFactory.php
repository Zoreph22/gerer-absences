<?php
namespace App\Controllers\Api\Factories;

use App\Controllers\Api\DataApi\GroupeApi;
use App\Controllers\Api\DataApi\AbsencesApi;
use App\Controllers\Api\DataApi\ApprenantApi;
use App\Controllers\Api\PagesApi\RecapPageApi;
use App\Controllers\Api\Factories\ApiFactoryInterface;

class ApiFactory implements ApiFactoryInterface {
  public function __construct() {
    $this->initGroupeApi();
    $this->initApprenantApi();
    $this->initAbsencesApi();
    $this->initRecapPageApi();
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

  public function initRecapPageApi() {
    return new RecapPageApi();
  }
  }
