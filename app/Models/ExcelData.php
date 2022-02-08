<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ExcelData extends Model
{
    use HasFactory;
    protected $table = 'excel_data';
    protected $fillable = ['name','age'];
}
