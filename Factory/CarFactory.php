<?php

namespace Factory;

require_once 'autoload.php';

use Cars\BaseCar;
use Cars\Car;
use Cars\Truck;
use Cars\SpecMachine;
use InvalidArgumentException;

class CarFactory
{
    public static function createCar(array $data): BaseCar {
        $carType = $data['car_type'];

        switch ($carType) {
            case 'car':
                return new Car(
                    $data['car_type'],
                    $data['brand'],
                    $data['photo_file_name'],
                    (int) $data['passenger_seats_count']
                );
            case 'truck':
                $bodyWhl = empty($data['body_whl']) ? '0x0x0' : $data['body_whl'];
                list($bodyWidth, $bodyHeight, $bodyLength) = explode('x', $bodyWhl);
                return new Truck(
                    $data['car_type'],
                    $data['brand'],
                    $data['photo_file_name'],
                    (float) $bodyWidth,
                    (float) $bodyHeight,
                    (float) $bodyLength,
                    (float) $data['carrying']
                );
            case 'spec_machine':
                return new SpecMachine(
                    $data['car_type'],
                    $data['brand'],
                    $data['photo_file_name'],
                    $data['extra']
                );
            default:
                throw new InvalidArgumentException("Неверный тип транспортного средства");
        }
    }
}