<?php

require_once 'autoload.php';

use PHPUnit\Framework\TestCase;
use Factory\CarFactory;
use Cars\Car;
use Cars\Truck;
use Cars\SpecMachine;

class CarFactoryTest extends TestCase
{
    /**
     * @dataProvider carData
     */
    public function testCreateCar(array $carData, string $expectedClass)
    {
        $car = CarFactory::createCar($carData);
        $this->assertInstanceOf($expectedClass, $car);
    }

    /**
     * @dataProvider invalidTypeData
     */
    public function testCreateCarInvalidType(array $carData)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Неверный тип транспортного средства");
        CarFactory::createCar($carData);
    }

    public function carData()
    {
        return [
            [
                [
                    'car_type' => 'car',
                    'brand' => 'Nissan',
                    'photo_file_name' => 'xTtrail 4 f1.jpeg',
                    'passenger_seats_count' => 4,
                ],
                Car::class,
            ],
            [
                [
                    'car_type' => 'truck',
                    'brand' => 'Man',
                    'photo_file_name' => 'f2.jpeg',
                    'body_whl' => '8x3x2.5',
                    'carrying' => 20,
                ],
                Truck::class,
            ],
            [
                [
                    'car_type' => 'spec_machine',
                    'brand' => 'Caterpillar',
                    'photo_file_name' => 'excavator.jpg',
                    'extra' => 'Excavator',
                ],
                SpecMachine::class,
            ]
        ];
    }

    public function invalidTypeData(): array
    {
        return [
            [
                [
                    'car_type' => 'invalid_type',
                    'brand' => 'Nissan',
                    'photo_file_name' => 'xTtrail 4 f1.jpeg',
                    'passenger_seats_count' => 4,
                ],
            ],
        ];
    }
}
