<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HuyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::get('https://provinces.open-api.vn/api/d/');
        $provinces = $response->json();

        foreach ($provinces as $province) {
            DB::table('huyen')->insert([
                'ID_TinhThanh' => $province['province_code'],
                'TenHuyen' => $province['name'],
                'MaHuyen' => $province['code'],
                'created_at' => now(),
            ]);
        }
    }
}
