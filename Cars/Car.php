<?php

namespace Cars;

require_once 'autoload.php';
class Car extends BaseCar
{
    public int $passengerSeatsCount;

    public function __construct(string $carType, string $brand, string $photoFileName, int $passengerSeatsCount)
    {
        parent::__construct($carType, $brand, $photoFileName);
        $this->passengerSeatsCount = $passengerSeatsCount;
    }

    public function __toString()
    {
        return "Тип: {$this->carType}\n" .
            "Марка: {$this->brand}\n" .
            "Фото: {$this->photoFileName}\n" .
            "Расширение файла: {$this->getPhotoFileExt()}\n" .
            "Количество мест: {$this->passengerSeatsCount}\n";
    }
}