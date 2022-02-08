<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExcelData;
use App\Exports\ExcelDataExport;
use App\Imports\ExcelDataImport;
use Excel;

class ExcelDataController extends Controller
{
    public function addExcelData() 
    {
        $excelData = [
        ["name"=>"Dao Minh Quan", "age"=>40],
        ["name"=>"Nguyen Sy Thang", "age"=>20],
        ["name"=>"Nguyen Minh Duc", "age"=>35]
        ];
        ExcelData::insert($excelData);
        return "Record are inserted";
    }
    
    public function exportIntoExcel()
    {
        return Excel::download(new ExcelDataExport, 'excel_data.xlsx');
    }

    public function exportIntoCSV()
    {
        return Excel::download(new ExcelDataExport,'excel_data.csv');
    }

    public function importFrom()
    {
        return view('import-form');
    }

    public function import(Request $request)
    {
        // dd($request->file);
        Excel::import(new ExcelDataImport, $request->file);
        return "Record are imported successfuly!";
    }

}
