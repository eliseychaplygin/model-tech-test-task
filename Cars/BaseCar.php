<?php

namespace Cars;

require_once 'autoload.php';

use Interface\CarInterface;

abstract class BaseCar implements CarInterface
{
    public string $carType;
    public string $brand;
    public string $photoFileName;

    public function __construct(string $carType, string $brand, string $photoFileName)
    {
        $this->carType = $carType;
        $this->brand = $brand;
        $this->photoFileName = $photoFileName;
    }

    public function getPhotoFileExt(): string
    {
        $parts = explode('.', $this->photoFileName);
        return '.' . end($parts);
    }
}