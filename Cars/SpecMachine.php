<?php

namespace Cars;

require_once 'autoload.php';

class SpecMachine extends BaseCar
{
    public string $extra;

    public function __construct(string $carType, string $brand, string $photoFileName, string $extra)
    {
        parent::__construct($carType, $brand, $photoFileName);
        $this->extra = $extra;
    }

    public function __toString()
    {
        return "Тип: {$this->carType}\n" .
            "Марка: {$this->brand}\n" .
            "Фото: {$this->photoFileName}\n" .
            "Расширение файла: {$this->getPhotoFileExt()}\n" .
            "Дополнительная информация: {$this->extra}\n";
    }
}