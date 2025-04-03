<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaChiNhanHang extends Model
{
    use HasFactory;

    protected $table = 'dia_chi_nhan_hangs';

    protected $fillable = [
        'ID_User',
        'HoTen',
        'SoDienThoai',
        'DiaChi',
        'Xa',
        'Huyen',
        'Tinh',
        'MacDinh',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'ID_User');
    }
}
