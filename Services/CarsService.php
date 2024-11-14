<?php

namespace Services;

use Factory\CarFactory;
use InvalidArgumentException;

class CarsService
{
    private array $cars;

    public function setCars(array $cars): void
    {
        $this->cars = $cars;
    }

    public function getCars(): array
    {
        return $this->cars;
    }

    public function createCars(array $data): array
    {
        $cars = [];
        foreach ($data as $carData) {
            try {
                $cars[] = CarFactory::createCar($carData);
            } catch (InvalidArgumentException $e) {
                echo "Ошибка при создании объекта: " . $e->getMessage() . PHP_EOL;
            }
        }

        $this->setCars($cars);
        return $cars;
    }

    public function outputCarsInfo(): void
    {
        foreach ($this->getCars() as $car) {
            echo $car . "\n";
        }
    }
}