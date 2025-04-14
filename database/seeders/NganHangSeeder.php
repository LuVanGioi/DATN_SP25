<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NganHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::get('https://api.vietqr.io/v2/banks');
        $data = $response->json();

        foreach ($data['data'] as $row) {
            DB::table('ngan_hang')->insert([
                'name' => $row['name'],
                'code' => $row['code'],
                'bin' => $row['bin'],
                'shortName' => $row['shortName'],
                'logo' => $row['logo'],
                'swift_code' => $row['swift_code'],
                'short_name' => $row['short_name'],
                'created_at' => now(),
            ]);
        }
    }
}
