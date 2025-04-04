<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';
    protected $fillable = ['ID_User', 'HoTen', 'SoDienThoai', 'DiaChi', 'Xa', 'Huyen', 'Tinh', 'MacDinh'];
}
