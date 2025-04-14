<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BienTheSeeder extends Seeder
{
    
    public function run(): void
    {
        
        DB::table('bien_the')->truncate();

        DB::table('bien_the')->insert([
            [
                'id' => 1,
                'TenBienThe' => 'Kích Cỡ',
                'created_at' => now()
            ],
            [
                'id' => 2,
                'TenBienThe' => 'Màu Sắc',
                'created_at' => now()
            ],
        ]);
    }
}
