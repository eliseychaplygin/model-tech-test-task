<?php

namespace Services;

class CsvService
{
    private string $filePath;

    public function setFileName(string $filePath): void
    {
        $this->filePath = $filePath;
    }

    public function getFilePath(): string
    {
        return $this->filePath;
    }

    public function getCarList(): array
    {
        $data = [];
        if (($handle = fopen($this->getFilePath(), "r")) !== FALSE) {
            $header = fgetcsv($handle, 1000, ";");
            while (($row = fgetcsv($handle, 1000, ";")) !== FALSE) {
                if (count($row) === count($header)) {
                    $data[] = array_combine($header, $row);
                } else {
                    echo "Предупреждение: Строка с неверным количеством столбцов пропущена.\n";
                }
            }
            fclose($handle);
        }
        return $data;
    }
}