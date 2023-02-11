<?php
use App\App;
use App\Test;
use App\Models\Database\DbConnection;
use App\Controllers\Api\Factories\ApiFactory;

require __DIR__ . '/vendor/autoload.php';

App::init();

DbConnection::connect();
new ApiFactory();

 // Test::init();
 // Test::groupeTest();
 // Test::ApprenantTest();
 // Test::AbsenceTest();
 // Test::RecapAbsencesTest();

App::$app->run();