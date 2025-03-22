<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TinhThanhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::get('https://provinces.open-api.vn/api/p/');
        $provinces = $response->json();

        foreach ($provinces as $province) {
            DB::table('tinh_thanh')->insert([
                'TenThanhPho' => $province['name'],
                'MaTinh' => $province['codename'],
                'IdTinh'=> $province['code'],
                'created_at' => now(),
            ]);
        }
    }
}
