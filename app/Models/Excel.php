<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function excel_details()
    {
        return $this->hasMany(ExcelDetail::class);
    }
}