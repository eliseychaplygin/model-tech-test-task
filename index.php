<?php

require_once 'autoload.php';

use Services\CsvService;
use Services\CarsService;

$filePath = 'Исходные_данные_для_задания_с_машинами.csv';

$csvService = new CsvService();
$carsService = new CarsService();

$csvService->setFileName($filePath);

$carsData = $csvService->getCarList();
$carsService->createCars($carsData);
$carsService->outputCarsInfo();