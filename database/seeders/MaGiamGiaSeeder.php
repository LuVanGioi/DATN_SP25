<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MaGiamGia;

class MaGiamGiaSeeder extends Seeder
{
    public function run()
    {
        MaGiamGia::create([
            'name' => 'Giảm 10%',
            'value' => 10,
            'min_value' => 100,
            'max_value' => 500,
            'condition' => 'Mua hàng từ 100k',
            'start_date' => '2025-02-01',
            'end_date' => '2025-02-28',
            'status' => 'Hoạt động',
        ]);

        MaGiamGia::create([
            'name' => 'Giảm 20%',
            'value' => 20,
            'min_value' => 200,
            'max_value' => 1000,
            'condition' => 'Mua hàng từ 200k',
            'start_date' => '2025-03-01',
            'end_date' => '2025-03-31',
            'status' => 'Ngừng hoạt động',
        ]);
    }
}
