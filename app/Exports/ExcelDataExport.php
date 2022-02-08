<?php

namespace App\Exports;

use App\Models\ExcelData;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Facades\Schema;


class ExcelDataExport implements FromCollection, WithHeadings, WithMapping
{
    private $table = "excel_data";

    // public function headings():array 
    // {
    //     return [
    //         'id',
    //         'name',
    //         'age'
    //     ];
    // }

    public function headings(): array
    {
        return  Schema::getColumnListing($this->table);
    }

    public function map($row): array
    {
        $array = [];
        $columns = Schema::getColumnListing($this->table);

        foreach ($columns as $column) {
            $array[] = $row->{$column};
        }
        return $array;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ExcelData::all();
        //  return collect(ExcelData::getExcelData());
    }
}
