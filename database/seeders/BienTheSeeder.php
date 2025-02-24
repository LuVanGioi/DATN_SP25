<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BienTheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <=2; $i++){
            DB::table('bien_the')->insert([
                'TenBienThe' => 'Màu Sắc',
                'created_at' => date('Y/m/d H:i:s') 
            ]);
        }
    }
}
