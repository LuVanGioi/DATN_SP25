<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaGiamGia extends Model
{
    use HasFactory;

    protected $table = 'maGiamGia';

    protected $fillable = [
        'name',
        'quantity', 
        'value',
        'min_value',
        'max_value',
        'condition',
        'start_date',
        'end_date',
        'status',
    ];
}