<?php

namespace App\Imports;

use App\Models\ExcelData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class ExcelDataImport implements ToModel, WithHeadingRow
{
    use Importable;
    public function model(array $row)
    {
        return new ExcelData([
            'name' => $row['name'],
            'age'  => $row['age'],
        ]);
    }

    public function headingRow(): int
    {
        return 2;
    }
}
