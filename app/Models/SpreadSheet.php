<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpreadSheet extends Model
{
    use HasFactory;
    // スプレッドシート挿入用Function
    static function insert_spread_sheet($insert_data)
    {
        // GoogleClientインスタンスの生成
        $sheets = SpreadSheet::instance();

        // SpreadSheet id は URLのこの ×××××××××××××× 部分です。
        // https://docs.google.com/spreadsheets/d/××××××××××××××/edit#gid=0
        $sheet_id = '××××××××××××××';
        $range = 'A1:F10';
        $response = $sheets->spreadsheets_values->get($sheet_id, $range);   
        // 格納する行の計算
        $row = count($response->getValues()) + 1;

        // データを整形（この順序でシートに格納される）
        $contact = [
            $insert_data['name'],
            $insert_data['occupation'],
            $insert_data['age'],
            $insert_data['is_male']
        ];
        $values = new \Google_Service_Sheets_ValueRange();
        $values->setValues([
            'values' => $contact
        ]);
        $sheets->spreadsheets_values->append(
            $sheet_id,
            'A'.$row,
            $values,
            ["valueInputOption" => 'USER_ENTERED']
        );

        foreach ($response->getValues() as $index => $cols) {
            var_dump($cols);
        }   
        dd($response->getValues());  

        return true;
    }

    // スプレッドシート操作用のインスタンスを生成するFunction
    public static function instance() {
        // storage/app/json フォルダに GCP からダウンロードした JSON ファイルを設置する
        $credentials_path = storage_path('app/json/spreadsheet-push.json');
        $client = new \Google_Client();
        $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
        $client->setAuthConfig($credentials_path);
        return new \Google_Service_Sheets($client);
    }
}
