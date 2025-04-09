<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('method_settings')->insert([
            'NhaCungCap' => 'Momo',
            'partner_code' => 'YOUR_PARTNER_CODE',
            'access_key' => 'YOUR_ACCESS_KEY',
            'secret_key' => 'YOUR_SECRET_KEY',
            'api_endpoint' => 'https://test-payment.momo.vn/v2/gateway/api/create',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
