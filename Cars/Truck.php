<?php

namespace Cars;

require_once 'autoload.php';
class Truck extends BaseCar
{
    public float $bodyWidth;
    public float $bodyHeight;
    public float $bodyLength;
    public float $carrying;

    public function __construct(
        string $carType,
        string $brand,
        string $photoFileName,
        float $bodyWidth,
        float $bodyHeight,
        float $bodyLength,
        float $carrying
    )
    {
        parent::__construct($carType, $brand, $photoFileName);
        $this->bodyWidth = $bodyWidth;
        $this->bodyHeight = $bodyHeight;
        $this->bodyLength = $bodyLength;
        $this->carrying = $carrying;
    }

    public function getBodyVolume(): float {
        return $this->bodyWidth * $this->bodyHeight * $this->bodyLength;
    }

    public function __toString()
    {
        return "Тип: {$this->carType}\n" .
            "Марка: {$this->brand}\n" .
            "Фото: {$this->photoFileName}\n" .
            "Расширение файла: {$this->getPhotoFileExt()}\n" .
            "Ширина кузова: {$this->bodyWidth}\n" .
            "Высота кузова: {$this->bodyHeight}\n" .
            "Длина кузова: {$this->bodyLength}\n" .
            "Объем кузова: {$this->getBodyVolume()}\n" .
            "Грузоподъемность: {$this->carrying}\n";
    }
}