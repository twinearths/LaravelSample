<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpreadSheet;

class SpreadSheetController extends Controller
{
    public function store()
    {
        $spread_sheet = new SpreadSheet();

        // スプレッドシートに格納するデータ
        $insert_data = [
            'name' => 'Dao Minh Quan',
            'occupation' => 'System Enginer',
            'age' => 30,
            'is_male'  => true
        ];

        $spread_sheet->insert_spread_sheet($insert_data);

        return response('Input Success! ! !', 200);
    }

}
